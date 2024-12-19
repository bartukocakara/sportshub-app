<?php

namespace Tests\Feature\Controllers;

use App\Models\Country;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class CountryControllerTest extends BaseTestCase
{
    public function test_list_country_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $response = $this->getJson(route('countries.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_create_country_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = Country::factory()->make();
        $response = $this->postJson(route('countries.store'), $model->toArray());
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_create_country_status_unproccessable_content()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $data = [
            'names' => "name",
        ];
        $response = $this->postJson(route('countries.store'), $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_show_country_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = Country::factory()->create();
        $response = $this->getJson(route('countries.show', $model->id));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_update_country_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = Country::factory()->create();
        $modelMake = Country::factory()->make();
        $data = $modelMake->toArray();

        $response = $this->putJson(route('countries.update', $model->id), $data);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function test_delete_country_status_ok()
    {
        $user = $this->createUser();
        Sanctum::actingAs($user, ['*']);

        $model = Country::factory()->create();
        $response = $this->deleteJson(route('countries.destroy', $model->id));
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
