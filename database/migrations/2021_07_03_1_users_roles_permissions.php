<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersRolesPermissions extends Migration
{

    public function up()
    {
        Schema::create(config('tabels.usersTable'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        /* roles  */ {
            Schema::create(config('tabels.rolesTable'), function (Blueprint $table) {
                $table->id();

                $table->string('name')->unique();
                $table->string('display_name')->nullable();

                $table->timestamps();
            });

            Schema::create(config('tabels.roleUserTable'), function (Blueprint $table) {

                $table->foreignId('role_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->string('user_type');

                $table->primary(['user_id', 'role_id', 'user_type']);
            });
        }

        /* permissions  */ {
            Schema::create(config('tabels.permssionsTable'), function (Blueprint $table) {
                $table->id();

                $table->string('name')->unique();
                $table->string('display_name')->nullable();

                $table->timestamps();
            });

            Schema::create(config('tabels.permssionUserTable'), function (Blueprint $table) {

                $table->foreignId('permission_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->string('user_type');

                $table->primary(['user_id', 'permission_id', 'user_type']);
            });

            Schema::create(config('tabels.permssionRoleTable'), function (Blueprint $table) {

                $table->foreignId('permission_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('role_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['permission_id', 'role_id']);
            });
        }
    }
    public function down()
    {
        Schema::dropIfExists(config('tabels.usersTable'));

        Schema::dropIfExists(config('tabels.rolesTables'));
        Schema::dropIfExists(config('tabels.roleUserTable'));

        Schema::dropIfExists(config('tabels.permssionsTable'));
        Schema::dropIfExists(config('tabels.permssionUserTable'));
        Schema::dropIfExists(config('tabels.permssionRoleTable'));
    }
}
