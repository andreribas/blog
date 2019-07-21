<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreateShortcuts;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuestPermissionsTest extends TestCase
{
    use CreateShortcuts;
    use RefreshDatabase;
    use WithFaker;

    //Route::get('/posts', 'PostController@index')->name('posts.index');
    /** @test  */
    public function a_guest_user_can_list_all_posts()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    //Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
    /** @test  */
    public function a_guest_user_can_view_a_post()
    {
        $post = $this->createPost();

        $response = $this->get("/posts/{$post->id}");

        $response->assertStatus(200);
    }

    //Route::get('/posts/create', 'PostController@create')->name('posts.create');
    /** @test  */
    public function a_guest_can_not_access_form_to_create_a_post()
    {
        $response = $this->get("/posts/create");

        $response->assertRedirect('/login');
    }

    //Route::post('/posts', 'PostController@store')->name('posts.store');
    /** @test  */
    public function a_guest_can_not_create_a_post()
    {
        $response = $this->post("/posts", ['title' => $this->faker->sentence(5), 'body' => $this->faker->text]);

        $response->assertRedirect('/login');
    }

    //Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    /** @test  */
    public function a_guest_can_not_access_form_to_edit_post()
    {
        $post = $this->createPost();

        $response = $this->get("/posts/{$post->id}/edit");

        $response->assertRedirect('/login');
    }

    //Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');
    /** @test  */
    public function a_guest_can_not_edit_post()
    {
        $post = $this->createPost();

        $response = $this->patch("/posts/{$post->id}", ['title' => $this->faker->sentence(5), 'body' => $this->faker->text]);

        $response->assertRedirect("/login");
    }

    //Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
    /** @test  */
    public function a_guest_can_not_delete_post()
    {
        $post = $this->createPost();

        $response = $this->delete("/posts/{$post->id}");

        $response->assertRedirect("/login");
    }

}
