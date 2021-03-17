<?php declare(strict_types=1);
/*
 * This file is part of the feed-io package.
 *
 * (c) Alexandre Debril <alex.debril@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FeedIo;

use FeedIo\Rule\DateTimeBuilderInterface;

abstract class DateRuleAbstract extends RuleAbstract
{
    protected ?DateTimeBuilderInterface $dateTimeBuilder = null;

    protected string $defaultFormat = \DateTime::RSS;

    public function setDateTimeBuilder(DateTimeBuilderInterface $dateTimeBuilder) : DateRuleAbstract
    {
        $this->dateTimeBuilder = $dateTimeBuilder;

        return $this;
    }

    public function getDateTimeBuilder() : DateTimeBuilderInterface
    {
        if (is_null($this->dateTimeBuilder)) {
            throw new \UnexpectedValueException('date time builder should not be null');
        }

        return $this->dateTimeBuilder;
    }

    /**
     * @return string
     */
    public function getDefaultFormat() : string
    {
        return $this->defaultFormat;
    }

    /**
     * @param string $defaultFormat
     */
    public function setDefaultFormat(string $defaultFormat) : void
    {
        $this->defaultFormat = $defaultFormat;
    }
}
