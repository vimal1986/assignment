<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{

    /** Table associated with model */
    protected $table = 'requests';


    public $services_active;

    public $open;
    public $closed;
    public $inProgress;
    public $active = false;

    public $caseOpen = 'Open';
    public $caseClosed = 'Closed';
    public $caseInProgress = 'In Progress';


    public static $s_Open = 'Open';
    public static $s_Closed = 'Closed';
    public static $s_inProgress = 'In Progress';


    public function init()
    {
        $this->getActive();
        $this->getOpened();
        $this->getClosed();
        $this->getInProgress();
    }

    public function getModelObject()
    {
        return $this;
    }

    public function getActiveContents()
    {
//        if (false === $this->active) {
        $this->active = self::active();
//        }
        return $this->active;
    }

    public static function active($order = 'desc')
    {
        return self::where('is_active', 1);
    }

    public function getActive()
    {
        $this->services_active = $this->getActiveContents()->get();
    }

    public function getOpened()
    {
        $this->open = $this->getActiveContents()->where('status', 'Open')->get();
        return $this->open;
    }

    public function getClosed()
    {
        $this->closed = $this->getActiveContents()->where('status', 'Closed')->get();
        return $this->closed;
    }

    public function getInProgress()
    {
        $this->inProgress = $this->getActiveContents()->where('status', 'In Progress')->get();
        return $this->inProgress;
    }

    public function queryRequestByStatus($filter_status)
    {
        // TODO : Change DB enum
        $statuses = [$this->caseOpen, $this->caseClosed, $this->caseInProgress];

        if (in_array($filter_status, $statuses)) {
            return $this->getActiveContents()->where('status', $filter_status)->get();
        } elseif (is_null($filter_status)) {
            return $this->getActiveContents()->get();
        }

        return array();
    }

    public static function getStatuses()
    {
        return [self::$s_Open, self::$s_Closed, self::$s_inProgress];
    }

    public function getRequestsByStatus($filter_status)
    {
        // TODO : Change DB enum
        $statuses = [$this->caseOpen, $this->caseInProgress, $this->caseClosed];

        if (in_array($filter_status, $statuses)) {
            switch ($filter_status) {

                case $this->caseOpen:
                    return $this->open;
                    break;

                case $this->caseClosed:
                    return $this->closed;
                    break;

                case $this->caseInProgress:
                    return $this->inProgress;
                    break;

                default:
                    return $this->services_active;
                    break;
            }
        }

        return array();
    }

    public function getRequestsCountByStatus()
    {
        // TODO : Change functions to get only count from database
        $statuses_count = [
            $this->caseOpen => $this->getOpened(),
            $this->caseInProgress => $this->getInProgress(),
            $this->caseClosed => $this->getClosed()
        ];

        return $statuses_count;
    }

    public static function clean($val)
    {
        if (!is_null($val)) {
            return preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($val));
        }
        return "";
    }


}
