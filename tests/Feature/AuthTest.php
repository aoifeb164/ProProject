<?php
# @Date:   2020-12-01T09:34:53+00:00
# @Last modified time: 2020-12-01T10:55:25+00:00




namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class AuthTest extends TestCase
{
     public function testUserNeedsToBeLoggedInToSeeDashboard()
     {
       $response = $this->get('/home')->assertRedirect('/login');
   }
   public function testUserWithUserRoleCanAccessUserDashboard(){
     $user = User::factory()->create();
     $user->roles()->attach(Role::where('name', 'user')->first());

     // $user = User::where('id', 2)->first();

     $this->actingAs($user);
     $response = $this->get('/user/home')->assertOk();
  }

  public function testUserWithAdminRoleCanAccessAdminDashboard(){
    $user = User::factory()->create();
    $user->roles()->attach(Role::where('name', 'admin')->first());

    // $user = User::where('id', 2)->first();

    $this->actingAs($user);
    $response = $this->get('/admin/home')->assertOk();
  }

//   public function testUserWithAdminRoleCanAccessUserDashboard(){
//     $user = User::factory()->create();
//     $user->roles()->attach(Role::where('name', 'admin')->first());
//
//     // $user = User::where('id', 2)->first();
//
//     $this->actingAs($user);
//     $response = $this->get('/user/home')->assertRedirect('/user/home');
// }

  public function testOrdinaryUserCannotAccessAdminDashboard(){
    $user = User::factory()->create();
    $user->roles()->attach(Role::where('name', 'user')->first());

    // $user = User::where('id', 2)->first();

    $this->actingAs($user);
    $response = $this->get('/admin/home')->assertRedirect('/home');
  }
}
