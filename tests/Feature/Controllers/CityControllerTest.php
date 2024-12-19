<?php

namespace Tests\Feature\Controllers;

use App\Models\City;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class CityControllerTest extends BaseTestCase
{
    public function test_list_city_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $response = $this->getJson(route('cities.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_create_city_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = City::factory()->make();
        $response = $this->postJson(route('cities.store'), $model->toArray());
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_create_city_status_unproccessable_content()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $data = [
            'names' => "name",
        ];
        $response = $this->postJson(route('cities.store'), $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_show_city_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = City::factory()->create();
        $response = $this->getJson(route('cities.show', $model->id));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_update_city_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = City::factory()->create();
        $modelMake = City::factory()->make();
        $data = $modelMake->toArray();

        $response = $this->putJson(route('cities.update', $model->id), $data);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function test_delete_city_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = City::factory()->create();
        $response = $this->deleteJson(route('cities.destroy', $model->id));
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
