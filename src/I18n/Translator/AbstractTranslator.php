<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Core\I18n\Translator;

use Zend\I18n\Translator\TranslatorAwareInterface;
use Zend\I18n\Translator\TranslatorInterface;

abstract class AbstractTranslator implements TranslatorAwareInterface
{
    /**
     * @var TranslatorInterface
     */
    protected $translator = null;

    /**
     * Whether the translator is enabled.
     *
     * @var bool
     */
    protected $translatorEnabled = true;

    /**
     * Translator text domain to use.
     *
     * @var string
     */
    protected $translatorTextDomain = 'default';

    /**
     * Sets translator to use in helper
     *
     * @param  TranslatorInterface $translator  [optional] translator.
     *                                           Default is null, which sets no translator.
     * @param  string              $textDomain  [optional] text domain
     *                                           Default is null, which skips setTranslatorTextDomain
     * @return TranslatorAwareInterface
     */
    public function setTranslator(TranslatorInterface $translator = null, $textDomain = null)
    {
        $this->translator = $translator;

        if ($textDomain !== null) {
            $this->setTranslatorTextDomain($textDomain);
        }

        return $this;
    }

    /**
     * Returns translator used in object
     *
     * @return TranslatorInterface|null
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Checks if the object has a translator
     *
     * @return bool
     */
    public function hasTranslator()
    {
        return $this->translator !== null;
    }

    /**
     * Sets whether translator is enabled and should be used
     *
     * @param  bool $enabled [optional] whether translator should be used.
     *                       Default is true.
     * @return TranslatorAwareInterface
     */
    public function setTranslatorEnabled($enabled = true)
    {
        $this->translatorEnabled = $enabled;
        return $this;
    }

    /**
     * Returns whether translator is enabled and should be used
     *
     * @return bool
     */
    public function isTranslatorEnabled()
    {
        if ($this->hasTranslator()) {
            return $this->translatorEnabled;
        }

        return false;
    }

    /**
     * Set translation text domain
     *
     * @param  string $textDomain
     * @return TranslatorAwareInterface
     */
    public function setTranslatorTextDomain($textDomain = 'continent')
    {
        $this->translatorTextDomain = $textDomain;
        return $this;
    }

    /**
     * Return the translation text domain
     *
     * @return string
     */
    public function getTranslatorTextDomain()
    {
        return $this->translatorTextDomain;
    }
}