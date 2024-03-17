    <?php

    require_once __DIR__ . "/../Classes/Database.php";
    require_once __DIR__ . "/../Classes/User.php";

    class UserRepository extends Database
    {
        public function getAll()
        {
            $data = $this->getDb()->query('SELECT * FROM todo_user');

            $users = [];

            foreach ($data as $user) {
                $newUser = new User(
                    $user['userID'],
                    $user['name'],
                    $user['surname'],
                    $user['email'],
                    $user['password'],
                );

                $users[] = $newUser;
            }

            return $users;
        }

        public function displayName()
        {
            $data = $this->getDb()->query('SELECT name FROM todo_user WHERE userID = userID');
            $users = [];

            foreach ($data as $user) {
                $newUser = new User(
                    $user['userID'],
                    $user['name'],
                    $user['surname'],
                    $user['email'],
                    $user['password'],
                );

                $users[] = $newUser;
            }

            return $users;
        }

        public function findById($userID)
        {
            $request = 'SELECT * FROM todo_user WHERE userID = :userID';

            $query = $this->getDb()->prepare($request);

            $query->execute([':userID' => $userID]);

            $data = $query->fetch();

            if ($data) {
                $searchedUser = new User(
                    $data['userID'],
                    $data['name'],
                    $data['surname'],
                    $data['email'],
                    $data['password']
                );

                return $searchedUser;
            }
        }


        public function create($newUser)
        {
            $request = 'INSERT INTO todo_user (userID, name, surname, email, password)
             VALUES (:userID, :name, :surname, :email, :password)';
            $query = $this->getDb()->prepare($request);

            $query->execute([
                'userID' => $newUser->getUserID(),
                'name' => $newUser->getName(),
                'surname' => $newUser->getSurname(),
                'email' => $newUser->getEmail(),
                'password' => $newUser->getPassword(),
            ]);
        }

        public function update($user)
        {
            $request = 'UPDATE todo_user SET name = :name, surname = :surname, email = :email, password = :password  WHERE userID = :userID';

            $query = $this->getDb()->prepare($request);

            $query->execute([
                'name' => $user->getName(),
                'surname' => $user->getSurname(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'userID' => $user->getId(),

            ]);
        }

        public function delete($userID)
        {
            $request = 'DELETE FROM todo_user WHERE userID = :userID';

            $query = $this->getDb()->prepare($request);

            $query->execute([
                'userID' => $userID
            ]);
        }
    }
