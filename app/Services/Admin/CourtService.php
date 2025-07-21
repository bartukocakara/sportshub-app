<?php

namespace App\Services\Admin;

use App\Http\Resources\CourtResource;
use App\Models\Court;
use App\Repositories\CourtRepository;
use App\Services\CrudService;
use App\Services\File\FileRemove;
use App\Services\File\FileUpload;
use App\Services\MetaDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable; // Import Throwable for catch block

class CourtService extends CrudService
{
    protected CourtRepository $courtRepository;

    /**
     * @param CourtRepository $courtRepository
     * @return void
    */
    public function __construct(CourtRepository $courtRepository, protected MetaDataService $metaDataService)
    {
        $this->courtRepository = $courtRepository;
        parent::__construct($this->courtRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = []) : array
    {
        return [
            'courts'       => CourtResource::collection(
                                $this->courtRepository->all($request, $with)
                            )->response()->getData(true),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    public function profile(string $id, array $with = []) : array
    {
        return [
            'court'       => CourtResource::make($this->courtRepository->find($id, $with)),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest(),
        ];
    }

    public function create(Request $request) : array
    {
        return [
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    /**
     * Creates a new court and its associated data, including images.
     *
     * @param array $data The data for creating the court and its related models.
     * @param array $images An array of uploaded image files.
     * @return Court The newly created Court model instance.
     * @throws Throwable If an error occurs during the creation process.
     */
    public function createCourt(array $data, ?array $images = []): Court
    {
        return DB::transaction(function () use ($data, $images) {
            // 1. Create court
            $court = $this->courtRepository->create($data);

            // 2. Create address if provided
            if (!empty($data['court_address'])) {
                $court->courtAddress()->create($data['court_address']);
            }

            // 3. Add images using FileUpload service
            if ($images && is_array($images)) {
                $destinationPath = 'courts'; // Define your image storage path
                foreach ($images as $index => $image) {
                    if ($image && $image->isValid()) {
                        // Upload file using FileUpload service
                        // FileUpload::upload returns only the filename
                        $uploadedFileName = FileUpload::upload($court->id, $image, $destinationPath);

                        // Store the full path (destinationPath/filename) in the database
                        $court->courtImages()->create([
                            'order' => $index,
                            'file_path' => "$destinationPath/$uploadedFileName",
                        ]);
                    }
                }
            }

            return $court;
        });
    }

    /**
     * Updates an existing court and its associated data, including images.
     *
     * @param string $courtId The ID of the court to update.
     * @param array $data The data for updating the court and its related models.
     * @param array $images An array of uploaded image files.
     * @return Court The updated Court model instance.
     * @throws Throwable If an error occurs during the update process.
     */
    public function updateCourt(string $courtId, array $data, ?array $images = []): Court
    {
        return DB::transaction(function () use ($courtId, $data, $images) {
            $court = $this->courtRepository->find($courtId);

            if (!$court) {
                // Handle case where court is not found, e.g., throw an exception
                throw new \Exception("Court with ID {$courtId} not found.");
            }

            // Update court
            $court->update($data);

            // Update or create address
            if (!empty($data['court_address'])) {
                $court->courtAddress()->updateOrCreate(
                    ['court_id' => $court->id],
                    $data['court_address']
                );
            }

            // Process images
            $existingImages = $court->courtImages()->orderBy('order')->get()->keyBy('order');
            $removeFlags = $data['images_remove'] ?? [];
            $destinationPath = 'courts'; // Define your image storage path

            foreach (range(0, 9) as $index) {
                $remove = isset($removeFlags[$index]) && $removeFlags[$index] == '1';
                $file = $images[$index] ?? null;

                if ($remove) {
                    // If remove flag is set and an existing image exists at this order
                    if (isset($existingImages[$index])) {
                        $imageToDelete = $existingImages[$index];
                        // Extract filename and path for FileRemove
                        $fileName = basename($imageToDelete->file_path);
                        $filePathDir = dirname($imageToDelete->file_path);

                        // Delete from disk using FileRemove service
                        FileRemove::deleteFile($fileName, $filePathDir);
                        // Delete from database
                        $imageToDelete->delete();
                    }
                    // Continue to next iteration, as nothing else to do for this index
                    continue;
                }

                if ($file && $file->isValid()) {
                    // A new file has been uploaded for this index

                    // If an existing image is present at this order, delete it first
                    if (isset($existingImages[$index])) {
                        $imageToDelete = $existingImages[$index];
                        // Extract filename and path for FileRemove
                        $fileName = basename($imageToDelete->file_path);
                        $filePathDir = dirname($imageToDelete->file_path);

                        // Delete old image from disk using FileRemove service
                        FileRemove::deleteFile($fileName, $filePathDir);
                        // Delete old image record from database
                        $imageToDelete->delete();
                    }

                    // Upload new file using FileUpload service
                    // FileUpload::upload returns only the filename
                    $uploadedFileName = FileUpload::upload($court->id, $file, $destinationPath);

                    // Store the full path (destinationPath/filename) in the database
                    $court->courtImages()->create([
                        'order' => $index,
                        'file_path' => $destinationPath . '/' . $uploadedFileName,
                    ]);
                }
                // If neither remove nor new file, and an existing image is there, do nothing (keep it)
            }

            return $court;
        });
    }

    /**
     * Deletes a court and its associated data, including images.
     *
     * @param string $id The ID of the court to delete.
     * @return bool True if the court was deleted successfully, false otherwise.
     * @throws Throwable If an error occurs during deletion.
     */
    public function destroy(string $id): bool
    {
        try {
            $court = $this->courtRepository->find($id);

            // Check if court exists
            if (!$court) {
                return false; // Or throw a ModelNotFoundException
            }

            // Delete associated images from disk (from the 'public' disk)
            foreach ($court->courtImages as $image) {
                // Ensure file_path is not empty.
                // FileRemove::deleteFile handles the existence check.
                if ($image->file_path) {
                    // Extract filename and destination path from the stored file_path
                    $fileName = basename($image->file_path);
                    $destinationPath = dirname($image->file_path);
                    FileRemove::deleteFile($fileName, $destinationPath);
                }
            }

            // Delete DB relations (using cascade deletes if defined in model, or explicitly)
            // It's generally better to let Eloquent handle cascade deletes if relationships are set up.
            // If not, explicit deletion is necessary.
            $court->courtImages()->delete();
            $court->courtBusiness()->delete();
            $court->courtAddress()->delete();

            // Finally, delete the court itself
            return $court->delete();
        } catch (Throwable $th) {
            // Log the exception for debugging purposes
            // \Log::error("Error deleting court ID {$id}: " . $th->getMessage());
            throw $th; // Re-throw the exception to be handled upstream
        }
    }

}
