<?php

namespace App\Repository;

use App\Models\Actor;
use App\Models\Movie;
use App\Service\PDOService;
use DateTime;
use Exception;
use PDO;

class MovieRepository
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM movie';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }

    //array de Movie si en objet
    public function findAll(): array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll();
    }

    public function findFirstMovieToModel(): Movie
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchObject(Movie::class);
    }

    public function findAllMoviesToModel(): array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }



    //array de Movie si en objet
    public function findByTitle(string $title): array
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM movie WHERE title LIKE :title');
        $title = '%' . $title . '%';
        $query->bindParam(':title', $title);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @throws Exception
     */
    //Movie si en objet
    public function insertMovie(array $movie): array
    {
        $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie VALUE (null, :title, :release_date)');
        $title = $movie['title'];

        $releaseDate = $movie['releaseDate'];
        $query->bindParam(':title', $title);
        $query->bindParam(':release_date', $releaseDate);
        $query->execute();

        return $movie;
    }
}
