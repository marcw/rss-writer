<?php

namespace MarcW\RssWriter\Extension\Itunes;

final class Channel extends Common
{
    public static $availableCategories = [
        'Arts' => [
            'Design',
            'Fashion & Beauty',
            'Food',
            'Literature',
            'Performing Arts',
            'Visual Arts',
        ],
        'Business' => [
            'Business News',
            'Careers',
            'Investing',
            'Management & Marketing',
            'Shopping',
        ],
        'Comedy' => [],
        'Education' => [
            'Educational Technology',
            'Higher Education',
            'K-12',
            'Language Courses',
            'Training',
        ],
        'Games & Hobbies' => [
            'Automotive',
            'Aviation',
            'Hobbies',
            'Other Games',
            'Video Games',
        ],
        'Government & Organizations' => [
            'Local',
            'National',
            'Non-Profit',
            'Regional',
        ],
        'Health' => [
            'Alternative Health',
            'Fitness & Nutrition',
            'Self-Help',
            'Sexuality',
        ],
        'Kids & Family' => [],
        'Music' => [],
        'News & Politics' => [],
        'Religion & Spirituality' => [
            'Buddhism',
            'Christianity',
            'Hinduism',
            'Islam',
            'Judaism',
            'Other',
            'Spirituality',
        ],
        'Science & Medicine' => [
            'Medicine',
            'Natural Sciences',
            'Social Sciences',
        ],
        'Society & Culture' => [
            'History',
            'Personal Journals',
            'Philosophy',
            'Places & Travel',
        ],
        'Sports & Recreation' => [
            'Amateur',
            'College & High School',
            'Outdoor',
            'Professional',
        ],
        'Technology' => [
            'Gadgets',
            'Tech News',
            'Podcasting',
            'Software How-To',
        ],
        'TV & Film' => [],
    ];

    private $categories = [];
    private $complete;
    private $owner;

    public function setComplete($complete)
    {
        $this->complete = $complete;

        return $this;
    }

    public function getComplete()
    {
        return $this->complete;
    }

    public function setOwner(Owner $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setCategories(array $categories)
    {
        $this->categories = $categories;

        return $this;
    }

    public function addCategory($category)
    {
        foreach (static::$availableCategories as $parent => $subCategories) {
            if ($parent === $category) {
                break;
            }

            foreach ($subCategories as $subCategory) {
                if ($subCategory === $category) {
                    $category = [$parent, $category];
                    break 2;
                }
            }
        }

        $this->categories[] = $category;

        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }
}
