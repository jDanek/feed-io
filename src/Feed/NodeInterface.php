<?php declare(strict_types=1);

namespace Danek\FeedIo\Feed;

use Danek\FeedIo\Feed\Item\AuthorInterface;
use Danek\FeedIo\Feed\Node\CategoryInterface;

/**
 * Describes a node instance
 *
 * A node exposes attributes which are common to feeds and items
 */
interface NodeInterface
{

    /**
     * returns the author attribute
     *
     * @return AuthorInterface
     */
    public function getAuthor(): ?AuthorInterface;

    /**
     * sets $author to the object's attributes
     *
     * @param AuthorInterface|null $author
     * @return NodeInterface
     */
    public function setAuthor(AuthorInterface $author = null): NodeInterface;

    /**
     * returns a new AuthorInterface
     *
     * @return AuthorInterface
     */
    public function newAuthor(): AuthorInterface;

    /**
     * Returns node's title
     *
     * @return string
     */
    public function getTitle(): ?string;

    /**
     * Sets nodes's title
     *
     * @param string|null $title
     * @return NodeInterface
     */
    public function setTitle(string $title = null): NodeInterface;

    /**
     * Returns node's public id
     *
     * @return string
     */
    public function getPublicId(): ?string;

    /**
     * sets node's public id
     *
     * @param string|null $id
     * @return NodeInterface
     */
    public function setPublicId(string $id = null): NodeInterface;

    /**
     * Returns node's description
     *
     * @return string
     */
    public function getDescription(): ?string;

    /**
     * Sets node's description
     *
     * @param string|null $description
     * @return NodeInterface
     */
    public function setDescription(string $description = null): NodeInterface;

    /**
     * Returns the node's last modified date
     *
     * @return \DateTime
     */
    public function getLastModified(): ?\DateTime;

    /**
     * Sets the node's last modified date
     *
     * @param \DateTime|null $lastModified
     * @return NodeInterface
     */
    public function setLastModified(\DateTime $lastModified = null): NodeInterface;

    /**
     * Returns the node's host
     *
     * @return string
     */
    public function getHost(): ?string;

    /**
     * Returns the node's link
     *
     * @return string
     */
    public function getLink(): ?string;

    /**
     * Sets the nodes's link
     *
     * @param string|null $link
     * @return NodeInterface
     */
    public function setLink(string $link = null): NodeInterface;

    /**
     * returns node's categories
     *
     * @return iterable
     */
    public function getCategories(): iterable;

    /**
     * adds a category to the node
     *
     * @param CategoryInterface $category
     * @return NodeInterface
     */
    public function addCategory(CategoryInterface $category): NodeInterface;

    /**
     * returns a new CategoryInterface
     *
     * @return CategoryInterface
     */
    public function newCategory(): CategoryInterface;

    /**
     * returns an element's value
     *
     * @param string $name element name
     * @return string
     */
    public function getValue(string $name): ?string;

    /**
     * creates a new ElementInterface called $name and sets its value to $value
     *
     * @param string $name element name
     * @param string|null $value element value
     * @return NodeInterface
     */
    public function set(string $name, string $value = null): NodeInterface;
}
