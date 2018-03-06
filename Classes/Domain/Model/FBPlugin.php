<?php
namespace Tp3\Tp3Facebook\Domain\Model;

/***
 *
 * This file is part of the "tp3 Facebook" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Thomas Ruta &lt;email@thomasruta.de>, R&amp;P IT Consulting GmbH
 *
 ***/

/**
 * FBPlugin
 */
class FBPlugin extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{
    /**
     * facebookname
     *
     * @var string
     */
    protected $facebookname = '';

    /**
     * fbappid
     *
     * @var string
     * @validate NotEmpty
     */
    protected $fbappid = '';

    /**
     * options
     *
     * @var string
     */
    protected $options = '';

    /**
     * Returns the facebookname
     *
     * @return string $facebookname
     */
    public function getFacebookname()
    {
        return $this->facebookname;
    }

    /**
     * Sets the facebookname
     *
     * @param string $facebookname
     * @return void
     */
    public function setFacebookname($facebookname)
    {
        $this->facebookname = $facebookname;
    }

    /**
     * Returns the fbappid
     *
     * @return string $fbappid
     */
    public function getFbappid()
    {
        return $this->fbappid;
    }

    /**
     * Sets the fbappid
     *
     * @param string $fbappid
     * @return void
     */
    public function setFbappid($fbappid)
    {
        $this->fbappid = $fbappid;
    }

    /**
     * Returns the options
     *
     * @return string $options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets the options
     *
     * @param string $options
     * @return void
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }
}
