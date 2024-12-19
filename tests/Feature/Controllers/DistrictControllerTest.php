<?php

namespace Tests\Feature\Controllers;

use App\Models\District;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class DistrictControllerTest extends BaseTestCase
{
    public function test_list_district_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $response = $this->getJson(route('districts.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_create_district_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = District::factory()->make();
        $response = $this->postJson(route('districts.store'), $model->toArray());
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_create_district_status_unproccessable_content()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $data = [
            'names' => "name",
        ];
        $response = $this->postJson(route('districts.store'), $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_show_district_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = District::factory()->create();
        $response = $this->getJson(route('districts.show', $model->id));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_update_district_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = District::factory()->create();
        $modelMake = District::factory()->make();
        $data = $modelMake->toArray();

        $response = $this->putJson(route('districts.update', $model->id), $data);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function test_delete_district_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = District::factory()->create();
        $response = $this->deleteJson(route('districts.destroy', $model->id));
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
