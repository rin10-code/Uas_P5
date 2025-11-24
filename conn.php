 <?php
 require __DIR__.'/vendor/autoload.php';
 use Kreait\Firebase\Factory;
 $factory = (new Factory)
    ->withServiceAccount(__DIR__.'/notes-api-project-13c26-firebase-adminsdk-fbsvc-7db299a98b.json')
    ->withDatabaseUri('https://notes-api-project-13c26-default-rtdb.asia-southeast1.firebasedatabase.app///');
 $database = $factory->createDatabase();
