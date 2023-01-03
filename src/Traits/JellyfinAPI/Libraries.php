<?php

namespace Havenstd06\LaravelJellyfin\Traits\JellyfinAPI;

use Psr\Http\Message\StreamInterface;

trait Libraries
{
    /**
     * Gets Media Folders (Libraries)
     *
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getMediaFolders(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Library/MediaFolders";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Deletes items from the library and filesystem.
     *
     * @param array $ids
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function deleteItemsFromLibraryAndFilesystem(array $ids): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items";

        $this->setRequestQuery('ids', $ids);

        $this->verb = 'delete';

        return $this->doJellyfinRequest();
    }

    /**
     * Deletes an item from the library and filesystem.
     *
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function deleteItemFromLibraryAndFilesystem(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/$itemId";

        $this->verb = 'delete';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets album similar items.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getAlbumSimilarItems(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Albums/$itemId/Similar";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets artist similar items.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getArtistSimilarItems(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Artists/$itemId/Similar";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets all parents of an item.
     * Optional. Filter by user id, and attach user data.
     *
     * @param string $itemId
     * @param string|null $userId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getAllParentsOfAnItems(string $itemId, string $userId = null): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/$itemId/Ancestors";

        if (isset($userId)) {
            $this->setRequestQuery('userId', $userId);
        }

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Downloads item media.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function downloadsItemMedia(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/$itemId/Download";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Get the original file of an item.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getOriginalFile(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/$itemId/File";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets similar items.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getSimilarItems(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/$itemId/Similar";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Get theme songs and videos for an item.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getThemeSongsAndVideos(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/$itemId/ThemeMedia";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Get theme songs for an item.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getThemeSongs(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/$itemId/ThemeSongs";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Get theme videos for an item.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getThemeVideos(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/$itemId/ThemeVideos";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Get item counts.
     *
     * @param string|null $userId
     * @param bool|null $isFavorite
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getItemCounts(string $userId = null, bool|null $isFavorite = null): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/Counts";

        if (isset($userId)) {
            $this->setRequestQuery('userId', $userId);
        }

        if (isset($isFavorite)) {
            $this->setRequestQuery('isFavorite', $isFavorite);
        }

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets the library options info.
     *
     * @param string|null $libraryContentType
     * @param bool $isNewLibrary
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getLibraryOptionsInfo(string $libraryContentType = null, bool $isNewLibrary = false): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Items/Counts";

        if (isset($libraryContentType)) {
            $this->setRequestQuery('libraryContentType', $libraryContentType);
        }

        $this->setRequestQuery('isNewLibrary', $isNewLibrary);

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets all user media folders.
     *
     * @param bool|null $isHidden
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getAllUserMediaFolders(bool|null $isHidden = null): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Library/MediaFolders";

        if (isset($isHidden)) {
            $this->setRequestQuery('isHidden', $isHidden);
        }

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Starts a library scan.
     *
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function startLibraryScan(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Library/Refresh";

        $this->verb = 'post';

        return $this->doJellyfinRequest(false);
    }

    /**
     * Gets Movie similar items.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getMovieSimilarItems(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Movies/$itemId/Similar";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets TV Show similar items.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getTVSimilarItems(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Shows/$itemId/Similar";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets Trailer similar items.
     *
     * @param string $itemId
     * @return array|StreamInterface|string
     *
     * @throws \Throwable
     */
    public function getTrailerSimilarItems(string $itemId): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "Trailers/$itemId/Similar";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }
}