<?php

// Базовый класс для работы с базой данных
class Database
{
    public $table;
    public $allowed = [];

    // Получение таблицы
    public function getTable()
    {
        if (strlen($this->table) == 0)
            throw new ErrorException('Не указана таблица');
        return $this->table;
    }

    public function getAllowed()
    {
        if (count($this->allowed) === 0)
            throw new ErrorException;
        return $this->allowed;
    }

    /**
     * Получение одного элемента по ID
     *
     * @param $id
     * @return mixed
     */
    public
    function getOne($id)
    {
        $statement = 'SELECT * FROM ' . $this->getTable() . ' WHERE id=' . $id;
        $stmt = $this->pdo()->query($statement);
        return $stmt->fetch();
    }

    /**
     * Получение всех записей
     *
     * @return mixed
     */
    public
    function getAll()
    {
        $stmt = $this->pdo()->query('SELECT * FROM ' . $this->getTable());
        return $stmt->fetchAll();
    }

    /**
     * Создает новую запись
     *
     * @param array $data данные для сохранения
     */
    public
    function create($data)
    {
        $allowed = $this->getAllowed(); // Разрешенные столбцы
        $sql = 'INSERT INTO ' . $this->getTable() . ' SET ' . $this->pdoSet($allowed, $data);
        var_dump($sql);
        $stm = $this->pdo()->prepare($sql);
        $stm->execute($data);
    }

    /**
     * Обнавляет запись с указанным ID
     *
     * @param $id - id записи
     * @param $data - обновляемые поля
     */

    public
    function update($id, $data)
    {
        $allowed = $this->getAllowed(); // Разрешенные столбцы
        $sql = 'UPDATE ' . $this->getTable()
            . ' SET ' . $this->pdoSet($allowed, $data) . ' WHERE id = :id';

        $stm = $this->pdo()->prepare($sql);
        $data['id'] = $id;
        $stm->execute($data);

    }

    public function delete($id)
    {
        $sql = 'DELETE FROM ' . $this->getTable() . ' WHERE id=:id';
        $stm = $this->pdo()->prepare($sql);
        $data = ['id' => $id];
        $stm->execute($data);
    }

    protected
    function pdoSet($allowed, $values)
    {
        $set = '';
        foreach ($allowed as $field) {
            if (isset($values[$field])) $set .= $field . "=:$field, ";

        }
        return substr($set, 0, -2);
    }

    /**
     * Создает подключение к базе данных MYSQL
     *
     * @return PDO
     */
    protected
    function pdo()
    {
        $host = '127.0.0.1';
        $db = 'fullstack';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, $user, $pass, $opt);
    }
}