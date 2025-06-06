<?php
/**
 * Cytracon
 *
 * This source file is subject to the Cytracon Software License, which is available at https://www.cytracon.com/license
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to https://www.cytracon.com for more information.
 *
 * @category  Cytracon
 * @package   Cytracon_PageBuilder
 * @copyright Copyright (C) 2019 Cytracon (https://www.cytracon.com)
 */

namespace Cytracon\PageBuilder\Data\Element;

class TwitterTimeline extends \Cytracon\Builder\Data\Element\AbstractElement
{
    /**
     * @return \Cytracon\Builder\Data\Form\Element\Fieldset
     */
    public function prepareGeneralTab()
    {
        $general = parent::prepareGeneralTab();

            $general->addChildren(
                'page_url',
                'text',
                [
                    'sortOrder'       => 10,
                    'key'             => 'page_url',
                    'defaultValue'    => 'https://twitter.com/cytraconvn',
                    'templateOptions' => [
                        'label' => __('Timeline URL')
                    ]
                ]
            );

            $container1 = $general->addContainerGroup(
                'container1',
                [
                    'sortOrder' => 20
                ]
            );

                $container1->addChildren(
                    'box_width',
                    'number',
                    [
                        'sortOrder'       => 10,
                        'key'             => 'box_width',
                        'templateOptions' => [
                            'label' => __('Width')
                        ]
                    ]
                );

                $container1->addChildren(
                    'box_height',
                    'number',
                    [
                        'sortOrder'       => 20,
                        'key'             => 'box_height',
                        'defaultValue'    => 600,
                        'templateOptions' => [
                            'label' => __('Height')
                        ]
                    ]
                );

                $container1->addChildren(
                    'limit',
                    'number',
                    [
                        'sortOrder'       => 30,
                        'key'             => 'limit',
                        'templateOptions' => [
                            'label' => __('Number of Tweets')
                        ]
                    ]
                );

            $container2 = $general->addContainerGroup(
                'container2',
                [
                    'sortOrder' => 30
                ]
            );

                $container2->addChildren(
                    'show_replies',
                    'toggle',
                    [
                        'sortOrder'       => 10,
                        'key'             => 'show_replies',
                        'templateOptions' => [
                            'label' => __('Show Replies')
                        ]
                    ]
                );

                $container2->addChildren(
                    'chrome',
                    'select',
                    [
                        'sortOrder'       => 20,
                        'key'             => 'chrome',
                        'templateOptions' => [
                            'label' => __('Chrome'),
                            'options' => $this->getChrome()
                        ]
                    ]
                );

                $container2->addChildren(
                    'theme',
                    'select',
                    [
                        'sortOrder'       => 30,
                        'key'             => 'theme',
                        'defaultValue'    => 'light',
                        'templateOptions' => [
                            'label' => __('Theme'),
                            'options' => $this->getTheme()
                        ]
                    ]
                );

            $container3 = $general->addContainerGroup(
                'container3',
                [
                    'sortOrder' => 40
                ]
            );

                $container3->addChildren(
                    'border_color',
                    'color',
                    [
                        'sortOrder'       => 20,
                        'key'             => 'border_color',
                        'templateOptions' => [
                            'label' => __('Border Color'),
                            'hex'   => true
                        ]
                    ]
                );

                $container3->addChildren(
                    'lang',
                    'select',
                    [
                        'sortOrder'       => 30,
                        'key'             => 'lang',
                        'defaultValue'    => '',
                        'templateOptions' => [
                            'label'   => __('Language'),
                            'options' => $this->getLanguages()
                        ]
                    ]
                );

        return $general;
    }

    public function getTheme()
    {
        return [
            [
                'label' => 'dark',
                'value' => 'dark'
            ],
            [
                'label' => 'light',
                'value' => 'light'
            ]
        ];
    }

    public function getChrome()
    {
        return [
            [
                'label' => 'noheader',
                'value' => 'noheader'
            ],
            [
                'label' => 'nofooter',
                'value' => 'nofooter'
            ],
            [
                'label' => 'noborders',
                'value' => 'noborders'
            ],
            [
                'label' => 'transparent',
                'value' => 'transparent'
            ],
            [
                'label' => 'noscrollbar',
                'value' => 'noscrollbar'
            ]
        ];
    }

    public function getLanguages()
    {
        return [
            [
                'label' => __('Automatic'),
                'value' => ''
            ],
            [
                'label' => __('English'),
                'value' => 'en'
            ],
            [
                'label' => __('Arabic'),
                'value' => 'ar'
            ],
            [
                'label' => __('Bengali'),
                'value' => 'bn'
            ],
            [
                'label' => __('Czech'),
                'value' => 'cs'
            ],
            [
                'label' => __('Danish'),
                'value' => 'da'
            ],
            [
                'label' => __('German'),
                'value' => 'de'
            ],
            [
                'label' => __('Greek'),
                'value' => 'el'
            ],
            [
                'label' => __('Spanish'),
                'value' => 'es'
            ],
            [
                'label' => __('Persian'),
                'value' => 'fa'
            ],
            [
                'label' => __('Finnish'),
                'value' => 'fi'
            ],
            [
                'label' => __('Filipino'),
                'value' => 'fil'
            ],
            [
                'label' => __('French'),
                'value' => 'fr'
            ],
            [
                'label' => __('Hebrew'),
                'value' => 'he'
            ],
            [
                'label' => __('Hindi'),
                'value' => 'hi'
            ],
            [
                'label' => __('Hungarian'),
                'value' => 'hu'
            ],
            [
                'label' => __('Indonesian'),
                'value' => 'id'
            ],
            [
                'label' => __('Italian'),
                'value' => 'it'
            ],
            [
                'label' => __('Japanese'),
                'value' => 'ja'
            ],
            [
                'label' => __('Korean'),
                'value' => 'ko'
            ],
            [
                'label' => __('Malay'),
                'value' => 'msa'
            ],
            [
                'label' => __('Dutch'),
                'value' => 'nl'
            ],
            [
                'label' => __('Norwegian'),
                'value' => 'no'
            ],
            [
                'label' => __('Polish'),
                'value' => 'pl'
            ],
            [
                'label' => __('Portuguese'),
                'value' => 'pt'
            ],
            [
                'label' => __('Romanian'),
                'value' => 'ro'
            ],
            [
                'label' => __('Russian'),
                'value' => 'ru'
            ],
            [
                'label' => __('Swedish'),
                'value' => 'sv'
            ],
            [
                'label' => __('Thai'),
                'value' => 'th'
            ],
            [
                'label' => __('Turkish'),
                'value' => 'tr'
            ],
            [
                'label' => __('Ukrainian'),
                'value' => 'uk'
            ],
            [
                'label' => __('Urdu'),
                'value' => 'ur'
            ],
            [
                'label' => __('Vietnamese'),
                'value' => 'vi'
            ],
            [
                'label' => __('Chinese (Simplified)'),
                'value' => 'zh-cn'
            ],
            [
                'label' => __('Chinese (Traditional)'),
                'value' => 'zh-tw'
            ]
        ];
    }
}
