<?php
declare (strict_types=1);

namespace Project\Module\Album;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;

/**
 * Class AlbumRepository
 * @package Project\Module\Album
 */
class AlbumRepository
{
    const ALBUM_TABLE = 'album';

    const IMAGE_TABLE = 'image';

    const ALBUM_ORDERBY = 'albumDate';

    const IMAGE_ORDERBY = 'imageId';

    const ALBUM_ID = 'albumId';

    const ALBUM_ORDERKIND = 'DESC';

    const IMAGE_ORDERKIND = 'ASC';

    /** @var  Database $database */
    protected $database;

    /**
     * AlbumRepository constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @return array
     */
    public function getAllAlbums(): array
    {
        $query = $this->database->getNewSelectQuery(self::ALBUM_TABLE);
        $query->orderBy(self::ALBUM_ORDERBY, self::ALBUM_ORDERKIND);

        return $this->database->fetchAll($query);
    }

    /**
     * @param Id $albumId
     * @return array
     */
    public function getImagesForAlbum(Id $albumId): array
    {
        $query = $this->database->getNewSelectQuery(self::IMAGE_TABLE);
        $query->where(self::ALBUM_ID, '=', $albumId->toString());
        $query->orderBy(self::IMAGE_ORDERBY, self::IMAGE_ORDERKIND);

        return $this->database->fetchAll($query);
    }

    /**
     * @param Id $albumId
     * @return mixed
     */
    public function getAlbumByAlbumId(Id $albumId)
    {
        $query = $this->database->getNewSelectQuery(self::ALBUM_TABLE);
        $query->where(self::ALBUM_ID, '=', $albumId->toString());

        return $this->database->fetch($query);
    }

    /**
     * @param Album $album
     * @return bool
     */
    public function saveAlbum(Album $album): bool
    {
        if (!empty($this->getAlbumByAlbumId($album->getAlbumId()))) {
            $query = $this->database->getNewUpdateQuery(self::ALBUM_TABLE);
            $query->set('albumId', $album->getAlbumId()->toString());
            $query->set('title', $album->getTitle()->getTitle());
            $query->set('albumDate', $album->getAlbumDate()->toString());

            $query->where('albumId', '=', $album->getAlbumId()->toString());

            return $this->database->execute($query);
        }

        $query = $this->database->getNewInsertQuery(self::ALBUM_TABLE);
        $query->insert('albumId', $album->getAlbumId()->toString());
        $query->insert('title', $album->getTitle()->getTitle());
        $query->insert('albumDate', $album->getAlbumDate()->toString());

        return $this->database->execute($query);
    }
}