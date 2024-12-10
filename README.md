#
#
#
#
#


php artisan migrate
php artisan db:seed
php artisan serve


test cases (example)
php artisan test --filter=LoginTest::test_invalid_credentials_wrong_password