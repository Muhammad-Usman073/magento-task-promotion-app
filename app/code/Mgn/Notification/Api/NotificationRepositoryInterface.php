<?php declare(strict_types=1);

namespace Mgn\Notification\Api;

use Mgn\Notification\Api\Data\NotificationInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Blog post CRUD interface.
 * @api
 * @since 1.0.0
 */
interface NotificationRepositoryInterface
{
    /**
     * @param int $id
     * @return NotificationInterface
     * @throws LocalizedException
     */
    public function getById(int $id): NotificationInterface;
/**
     * @return array
     * @throws LocalizedException
     */
    public function getAllData(): array;

    /**
     * @param NotificationInterface $post
     * @return NotificationInterface
     * @throws LocalizedException
     */
    public function save(NotificationInterface $post): NotificationInterface;

    /**
     * @param int $id
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById(int $id): bool;
}
