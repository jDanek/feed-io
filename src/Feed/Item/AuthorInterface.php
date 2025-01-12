<?php declare(strict_types=1);

namespace Danek\FeedIo\Feed\Item;

/**
 * Describe a Author instance
 *
 */
interface AuthorInterface
{

    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     * @return AuthorInterface
     */
    public function setName(string $name = null): AuthorInterface;

    /**
     * @return string
     */
    public function getUri(): ?string;

    /**
     * @param string|null $uri
     * @return AuthorInterface
     */
    public function setUri(string $uri = null): AuthorInterface;

    /**
     * @return string
     */
    public function getEmail(): ?string;

    /**
     * @param string|null $email
     * @return AuthorInterface
     */
    public function setEmail(string $email = null): AuthorInterface;
}
