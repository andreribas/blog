<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreateShortcuts;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoggedUserPermissionsTest extends TestCase
{
    use CreateShortcuts;
    use RefreshDatabase;
    use WithFaker;

    //Route::get('/posts', 'PostController@index')->name('posts.index');
    /** @test  */
    public function a_logged_user_can_list_all_posts()
    {
        $this->actingAs($this->createUser());

        $response = $this->get("/posts");

        $response->assertStatus(200);
    }

    //Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
    /** @test  */
    public function a_logged_user_can_view_a_post()
    {
        $this->actingAs($this->createUser());
        $post = $this->createPost();

        $response = $this->get("/posts/{$post->id}");

        $response->assertStatus(200);
    }

    //Route::get('/posts/create', 'PostController@create')->name('posts.create');
    /** @test  */
    public function a_logged_user_can_access_form_to_create_a_post()
    {
        $this->actingAs($this->createUser());

        $response = $this->get("/posts/create");

        $response->assertStatus(200);
    }

    //Route::post('/posts', 'PostController@store')->name('posts.store');
    /** @test  */
    public function a_logged_user_can_create_a_post()
    {
        $this->actingAs($this->createUser());

        $response = $this->post("/posts", ['title' => $this->faker->sentence(5), 'body' => $this->faker->text]);

        $response->assertRedirect('/posts');
    }

    //Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    /** @test  */
    public function a_logged_user_can_access_form_to_edit_own_post()
    {
        $post = $this->createPost();
        $this->actingAs($post->user);

        $response = $this->get("/posts/{$post->id}/edit");

        $response->assertStatus(200);
    }

    /** @test  */
    public function a_logged_user_can_not_access_form_to_edit_another_user_post()
    {
        $post = $this->createPost();
        $this->actingAs($this->createUser());

        $response = $this->get("/posts/{$post->id}/edit");

        $response->assertForbidden();
    }

    //Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');
    /** @test  */
    public function a_logged_user_can_edit_own_post()
    {
        $post = $this->createPost();
        $this->actingAs($post->user);

        $response = $this->patch("/posts/{$post->id}", ['title' => $this->faker->sentence(5), 'body' => $this->faker->text]);

        $response->assertRedirect("/posts/{$post->id}");
    }

    /** @test  */
    public function a_logged_user_can_not_edit_another_user_post()
    {
        $post = $this->createPost();
        $this->actingAs($this->createUser());

        $response = $this->patch("/posts/{$post->id}");

        $response->assertForbidden();
    }

    //Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
    /** @test  */
    public function a_logged_user_can_delete_own_post()
    {
        $post = $this->createPost();
        $this->actingAs($post->user);

        $response = $this->delete("/posts/{$post->id}");

        $response->assertRedirect("/posts");
    }

    /** @test  */
    public function a_logged_user_can_not_delete_another_user_post()
    {
        $post = $this->createPost();
        $anotherUser = $this->createUser();

        $response = $this->actingAs($anotherUser)->delete("/posts/{$post->id}");

        $response->assertForbidden();
    }

}
