<?php

class SentrySeeder extends Seeder
{
    /**
     * Jalankan database seeder
     *
     * @return void
     */
    public function run()
    {
        //Hapus isi table users, group, user_groups dan throttle
        DB::table('users_groups')->delete();
        DB::table('groups')->delete();
        DB::table('users')->delete();
        DB::table('throttle')->delete();

        try
        {
            // Membuat grup admin
            $group = Sentry::createGroup(array(
                'name'        => 'admin',
                'permissions' => array(
                    'admin' => 1,
                ),
            ));
            // Membuat grup reguler
            $group = Sentry::createGroup(array(
                'name'        => 'user',
                'permissions' => array(
                    'user' => 1,
                ),
            ));
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Gourps\GroupExistsException $e) {
            echo 'Groups already exists';
        }

        try
        {
            // Membuat admin baru
            $admin = Sentry::register(array(
                // silahkan giganti sesuai keinginan
                'email'      => 'aan_choesni@ymail.com',
                'password'   => 'anchuz2016',
                'first_name' => 'Aan Choesni',
                'last_name'  => 'Herlingga',
            ), true); // langsung diaktivasi

            // Cari grup admin
            $adminGroup = Sentry::findGroupByName('admin');

            // Masukkan user ke grup admin
            $admin->addGroup($adminGroup);
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            echo 'Login field is required.';
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            echo 'Password field is reuired.';
        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            echo 'User with this login aready exists.';
        } catch (Cartalyst\Sentry\User\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }
    }
}
