<?php

namespace Sprint\Migration;


class ServicesCategories20221009152855 extends Version
{
    protected $description = "";

    protected $moduleVersion = "4.1.1";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'services',
            'rest_entity'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array(
                0 =>
                    array(
                        'NAME' => 'Парикмахерские услуги',
                        'CODE' => 'hairdressing-services',
                        'SORT' => '500',
                        'ACTIVE' => 'Y',
                        'XML_ID' => NULL,
                        'DESCRIPTION' => '',
                        'DESCRIPTION_TYPE' => 'text',
                    ),
                1 =>
                    array(
                        'NAME' => 'Маникюр',
                        'CODE' => 'manicure',
                        'SORT' => '500',
                        'ACTIVE' => 'Y',
                        'XML_ID' => NULL,
                        'DESCRIPTION' => '',
                        'DESCRIPTION_TYPE' => 'text',
                    ),
                2 =>
                    array(
                        'NAME' => 'Педикюр',
                        'CODE' => 'pedicure',
                        'SORT' => '500',
                        'ACTIVE' => 'Y',
                        'XML_ID' => NULL,
                        'DESCRIPTION' => '',
                        'DESCRIPTION_TYPE' => 'text',
                    ),
                3 =>
                    array(
                        'NAME' => 'Косметология',
                        'CODE' => 'cosmetology',
                        'SORT' => '500',
                        'ACTIVE' => 'Y',
                        'XML_ID' => NULL,
                        'DESCRIPTION' => '',
                        'DESCRIPTION_TYPE' => 'text',
                    ),
                4 =>
                    array(
                        'NAME' => 'Эстетист по телу',
                        'CODE' => 'body-esthetician',
                        'SORT' => '500',
                        'ACTIVE' => 'Y',
                        'XML_ID' => NULL,
                        'DESCRIPTION' => '',
                        'DESCRIPTION_TYPE' => 'text',
                    ),
                5 =>
                    array(
                        'NAME' => 'Визаж',
                        'CODE' => 'visage',
                        'SORT' => '500',
                        'ACTIVE' => 'Y',
                        'XML_ID' => NULL,
                        'DESCRIPTION' => '',
                        'DESCRIPTION_TYPE' => 'text',
                    ),
            ));
    }

    public function down()
    {
        //your code ...
    }
}
