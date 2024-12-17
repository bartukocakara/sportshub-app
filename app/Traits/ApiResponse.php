<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    /**
     * Prepare response.
     *
     * @param  string  $message
     * @param  int  $statusCode
     * @return array
     */
    public function prepareApiResponse(string $message = '', int $statusCode = Response::HTTP_OK): array
    {
        if (empty($message)) {
            $message = Response::$statusTexts[$statusCode];
        }

        return [
            'message'       => $message,
            'statusCode'    => $statusCode,
        ];
    }

    /**
     * Success Response
     * İstek başarılı oldu.
     *
     * @param  array  $data
     * @param  int  $statusCode
     * @param  string  $message
     * @return JsonResponse
     */
    public function successApiResponse($data = [], int $statusCode = Response::HTTP_OK, string $message = ''): JsonResponse
    {
        $response           = $this->prepareApiResponse($message, $statusCode);
        $response['status'] = "success";
        $response['result'] = $data;

        return response()->json($response, $statusCode);
    }

    /**
     * Error Response
     * İstek başarısız oldu.
     *
     * @param  array  $errors
     * @param  int  $statusCode
     * @param  string  $message
     * @return JsonResponse
     */
    public function errorApiResponse(array $errors = [],
                                    int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR,
                                    string $message = ''): JsonResponse
    {
        $response           = $this->prepareApiResponse($message, $statusCode);
        $response['status'] = "error";
        $response['result'] = $errors;
        return response()->json($response, $statusCode);
    }

    /**
     * Response with status code 200.
     * Tarayıcı ve sunucu tarafında her şeyin yolunda olduğu anlamına gelen ideal durum kodudur.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function okApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->successApiResponse($data, Response::HTTP_OK, $message);
    }

    /**
     * Response with status code 201.
     * Sunucu tarafından isteğin yerine getirildiği ve yeni bir kaynak oluşturulduğu anlamına gelir.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function createdApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->successApiResponse($data, Response::HTTP_CREATED, $message);
    }

    /**
     * Response with status code 202.
     * Sunucunun tarayıcıdan gelen isteği kabul ettiği ve işleme koyduğu anlamına gelir. İstek olumlu ya da olumsuz sonuçlanabilir.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function acceptedApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->successApiResponse($data, Response::HTTP_ACCEPTED, $message);
    }

    /**
     * Response with status code 204.
     * Sunucunun isteği başarıyla işlediği fakat herhangi bir içerik döndürmeyeceğini ifade eder.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function noContentApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->successApiResponse($data, Response::HTTP_NO_CONTENT, $message);
    }

    /**
     * Response with status code 400.
     * Sunucunun tarayıcıdaki hata nedeniyle isteği işleyemediği anlamına gelen durum kodudur.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function badRequestApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_BAD_REQUEST, $message);
    }

    /**
     * Response with status code 401.
     * Kullanıcının erişmek istediği kaynak için geçerli kimlik doğrulama bilgilerine sahip olmadığında döndürülen durum kodudur.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function unauthorizedApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_UNAUTHORIZED, $message);
    }

    /**
     * Response with status code 402.
     * Ödeme gerektiği ve gelecekte kullanılmak üzere rezerve edildiği anlamına gelen durum kodudur.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function paymentRequiredApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_PAYMENT_REQUIRED, $message);
    }

    /**
     * Response with status code 403.
     * İlgili kaynağa erişimin yasak olduğu durumlarda döndürülen durum kodudur.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function forbiddenApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_FORBIDDEN, $message);
    }

    /**
     * Response with status code 404.
     * İstenen kaynağın sunucuda bulunmadığını ifade eden durum kodudur. En sık görülen HTTP durum kodlarının başında gelmektedir.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function notFoundApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_NOT_FOUND, $message);
    }

    /**
     * Response with status code 409.
     * Bir uyuşmazlık ya da çakışma olması nedeniyle isteğin tamamlanamadığı anlamına gelen durum kodudur.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function conflictApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_CONFLICT, $message);
    }

    /**
     * Response with status code 422.
     * Anlamsal hata içeren istekleri sunucunun işleyemediği anlamına gelen durum kodudur.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function unprocessableApiResponse($data = [], string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY, $message);
    }

    /**
     * Hata yakalama için kullanılcak debug fonsiyonudur.
     *
     * @param  object  $e
     * @param  string  $message
     * @return JsonResponse
     */
    public function catchApiResponse( object $e, string $message = ''): JsonResponse
    {

        $data = [];
        $message = $e->getMessage();

        if (config('app.env') !== 'production') {
            $data = [
                'message'   => $e->getMessage(),
                'file'      => $e->getFile(),
                'line'      => $e->getLine(),
                'code'      => $e->getCode(),
            ];
        }

        return $this->unprocessableApiResponse($data, $message);
    }


}
