<?php declare(strict_types=1);

namespace Danek\FeedIo\Reader;

use Danek\FeedIo\Adapter\ResponseInterface;
use Danek\FeedIo\FeedInterface;
use Danek\FeedIo\Reader\Result\UpdateStats;

/**
 * Result of the read() operation
 *
 * a Result instance holds the following :
 *
 * - the Feed instance
 * - Date and time of the request
 * - value of the 'modifiedSince' header sent through the request
 * - the raw response
 * - the DOM document
 * - URL of the feed
 */
class Result
{

    /**
     * @var \DateTime
     */
    protected $modifiedSince;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var FeedInterface
     */
    protected $feed;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var UpdateStats
     */
    protected $updateStats;

    /**
     * @var Document
     */
    protected $document;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param Document $document
     * @param FeedInterface $feed
     * @param \DateTime $modifiedSince
     * @param ResponseInterface $response
     * @param string $url
     */
    public function __construct(
        Document $document,
        FeedInterface $feed,
        \DateTime $modifiedSince,
        ResponseInterface $response,
        string $url
    )
    {
        $this->date = new \DateTime();
        $this->document = $document;
        $this->feed = $feed;
        $this->modifiedSince = $modifiedSince;
        $this->response = $response;
        $this->url = $url;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * @return FeedInterface
     */
    public function getFeed(): FeedInterface
    {
        return $this->feed;
    }

    /**
     * @return \DateTime|null
     */
    public function getModifiedSince(): ?\DateTime
    {
        return $this->modifiedSince;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param int $minDelay
     * @param int $sleepyDelay
     * @param int $sleepyDuration
     * @param float $marginRatio
     * @return \DateTime
     */
    public function getNextUpdate(
        int $minDelay = UpdateStats::DEFAULT_MIN_DELAY,
        int $sleepyDelay = UpdateStats::DEFAULT_SLEEPY_DELAY,
        int $sleepyDuration = UpdateStats::DEFAULT_DURATION_BEFORE_BEING_SLEEPY,
        float $marginRatio = UpdateStats::DEFAULT_MARGIN_RATIO
    ): \DateTime
    {
        $updateStats = $this->getUpdateStats();
        return $updateStats->computeNextUpdate($minDelay, $sleepyDelay, $sleepyDuration, $marginRatio);
    }

    /**
     * @return UpdateStats
     */
    public function getUpdateStats(): UpdateStats
    {
        if (is_null($this->updateStats)) {
            $this->updateStats = new UpdateStats($this->getFeed());
        }

        return $this->updateStats;
    }
}
