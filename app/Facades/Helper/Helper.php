<?php

namespace App\Facades\Helper;

/**
 * Class Helper
 * @package App\Facades\Helper
 */
class Helper
{

    /**
     * 获取指定日期段内每一天的日期
     * @param string $startDate 开始日期
     * @param string $endDate 结束日期
     * @return Array
     */
    public static function getDateFromRange($startDate, $endDate)
    {
        $startDateTime = date_create($startDate);
        $endDataTime = date_create($endDate);
        $days = date_diff($startDateTime, $endDataTime)->days;
        $dateArray = array();
        for ($i = 0; $i <= $days; $i++) {
            $dateArray[] = date("Y-m-d", strtotime("+" . $i . " day", strtotime($startDate)));
        }
        return $dateArray;
    }
}