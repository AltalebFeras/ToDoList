    <?php

require_once __DIR__ . "/../Classes/Database.php";
require_once __DIR__ . "/../Classes/User.php";

class UserRepository extends Database
{
    public function getAll()
    {
        $data = $this->getDb()->query('SELECT * FROM User');

        $users = [];

        foreach ($data as $user) {
            $newUser = new User(
                $user['name'],
                $user['surname'],
                $user['email'],
                $user['password'],
            );

            $users[] = $newUser;
        }

        return $users;
    }

    public function create($newUser)
    {
        $request = 'INSERT INTO todo_user (name, surname, email, password) VALUES (?, ?, ?, ?)';
        $query = $this->getDb()->prepare($request);

        $query->execute([
            $newUser->getName(),
            $newUser->getSurname(),
            $newUser->getEmail(),
            $newUser->getPassword(),
        ]);
    }
}