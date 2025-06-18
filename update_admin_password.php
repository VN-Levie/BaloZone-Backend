<?php
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "Updating admin password...\n";

$admin = User::where('email', 'admin@balozone.com')->first();
if ($admin) {
    $admin->password = Hash::make('password123');
    $admin->save();
    echo "✅ Admin password updated successfully!\n";
    echo "Email: {$admin->email}\n";
    echo "Name: {$admin->name}\n";
} else {
    echo "❌ Admin user not found!\n";
}
