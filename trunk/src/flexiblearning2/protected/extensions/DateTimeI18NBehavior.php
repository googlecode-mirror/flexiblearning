<?php

/*
 * DateTimeI18NBehavior
 * Automatically converts date and datetime fields to I18N format
 * 
 * Author: Ricardo Grana <rickgrana@yahoo.com.br>, <ricardo.grana@pmm.am.gov.br>
 * Version: 1.1
 * Requires: Yii 1.0.9 version 
 */

class DateTimeI18NBehavior extends CActiveRecordBehavior {

    public $dateIncomeFormat = 'dd/MM/yyyy';
    public $dateTimeIncomeFormat = 'dd/MM/yyyy H:i:s';
    public $dateOutcomeFormat = 'yyyy-MM-dd';
    public $dateTimeOutcomeFormat = 'yyyy-MM-dd H:i:s';
    public $dateDBFormat = 'Y-m-d';
    public $dateTimeDBFormat = 'Y-m-d H:i:s';

    public function beforeSave($event) {

        //search for date/datetime columns. Convert it to pure PHP date format
        foreach ($event->sender->tableSchema->columns as $columnName => $column) {
            if (($column->dbType != 'date') and ($column->dbType != 'datetime'))
                continue;

            if (!strlen($event->sender->$columnName)) {
                $event->sender->$columnName = null;
                continue;
            }

            if (($column->dbType == 'date')) {
                $event->sender->$columnName = 
                    date($this->dateDBFormat, 
                    CDateTimeParser::parse($event->sender->$columnName, $this->dateIncomeFormat));
            } else {
                $event->sender->$columnName = 
                    date($this->dateTimeDBFormat, 
                    CDateTimeParser::parse($event->sender->$columnName, $this->dateTimeIncomeFormat));
            }
        }

        return true;
    }

    public function afterFind($event) {
        foreach ($event->sender->tableSchema->columns as $columnName => $column) {
            if (($column->dbType != 'date') and ($column->dbType != 'datetime'))
                continue;

            if (!strlen($event->sender->$columnName)) {
                $event->sender->$columnName = null;
                continue;
            }

            if ($column->dbType == 'date') {
                $event->sender->$columnName = Yii::app()->dateFormatter->format(
                    $this->dateIncomeFormat, 
                    CDateTimeParser::parse($event->sender->$columnName, $this->dateOutcomeFormat)
                );
            } else {
                $event->sender->$columnName = Yii::app()->dateFormatter->format(
                    $this->dateTimeIncomeFormat, 
                    CDateTimeParser::parse($event->sender->$columnName, $this->dateTimeOutcomeFormat)
                );
            }
        }
        return true;
    }

}