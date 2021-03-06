<?php
/**
 * @package ElegantErrors
 * @subpackage ElegantTimer
 * @description  HTTP Status Codes & ErrorDocument directives with customizable templates and built in contact form
 * @author Gordon Hackett
 * @created 2015-10-02 15:03:17
 * @version 0.4.1
 * @updated 2015-11-08 13:36:55
 * @timestamp 1447018619786
 * @copyright 2015 Gordon Hackett :: Directional-Consulting.com
 *
 * This file is part of ElegantErrors.
 *
 * ElegantErrors is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * ElegantErrors is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ElegantErrors.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ElegantTimer, useful for timing PHP code execution, includes split times
 *
 * Example use:
 *    $ElegantTimer = new ElegantTimer;
 *    ...
 *    // Pass whatever comment you like
 *    $ElegantTimer->lap("in my_func() at start");
 *     ...
 *    $ElegantTimer->lap("in my_func() in middle");
 *    ...
 *    $ElegantTimer->lap("in my_func() at end");
 *
 * Example output:
 *     in my_func(), at start split time 0.00 seconds
 *     in my_func(), at start elapsed time 0.00 seconds
 *
 *     in my_func(), in middle complete split time 6.49 seconds
 *     in my_func(), in middle complete elapsed time 6.49 seconds
 *
 *   in my_func() at end split time 2.58 seconds
 *   in my_func() at end elapsed time 9.07 seconds
 *
  */
class ElegantTimer extends ElegantErrors {

    //properties
    var $start_time;
    var $stop_time;

    var $lap_times;

    /**
     * Initialise ElegantTimer by starting it going
     **/
    function __construct() {
//        parent::__construct();
        $this->lap_times = array();
        $this->start();
    }

    /**
     * Set start time
     */
    protected function start()
    {
        $this->start_time = $this->get_microtime();
    }

    /**
    /* get_microtime function taken from Everett Michaud on Zend.com
     */
    protected function get_microtime()
    {
        list($secs, $micros) = split(" ", microtime());
        $mt = $secs + $micros;

        return $mt;
    }


    /**
     * Set end time
     */
    protected function stop()
    {
        $this->stop_time = $this->get_microtime();
    }

    /**
     * Get the elapsed time
     */
    protected function get_elapsed()
    {
        $time_now = $this->get_microtime();
        $elapsed = $time_now  -  $this->start_time;

        return $elapsed;
    }

    /**
     * Get the last split (lap) time
     */
    protected function get_last_split()
    {
        $time_now = $this->get_microtime();
        $laps_done = sizeof($this->lap_times);
        if ($laps_done == 0) {
            $split = $time_now - $this->start_time;
        }
        else {
            $split_no = sizeof($this->lap_times) - 1;
            $split = $time_now - $this->lap_times[$split_no];
        }
        $this->lap_times[] = $time_now;

        return $split;
    }

    /**
     * Look at the times (i.e. print it!)
     */
    protected function lap($comment="")
    {
        $split = $this->get_last_split();
        $split = number_format($split, 2);

        $elapsed = $this->get_elapsed();
        $elapsed = number_format($elapsed, 2);

        print "$comment split time $split seconds<br>";
        print "$comment elapsed time $elapsed seconds<br>";
        print "<br>";
        flush();

        return true;

    }

    protected function rendered($comment="")
    {
        $split = $this->get_last_split();
        $split = number_format($split, 2);

        $elapsed = $this->get_elapsed();
        $elapsed = number_format($elapsed, 2);

        print "\n<!--page rendered: $elapsed seconds-->\n";
        flush();
    }

}
?>