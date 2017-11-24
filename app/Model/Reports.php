<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\AuditTrail;
use App\Model\Order;
use App\Model\OrderContent;
use App\Model\OrderTransaction;
use App\Model\Provider;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\PageView;
use App\Model\OrderRating;
use App\Model\Location;

use Illuminate\Support\Facades\DB;

class Reports extends Model
{
    public static function sales_graph($type=null) {
        switch ($type) {
            case 'Daily':

                $contents = OrderContent::select(DB::raw('DATE(created_at) as date, SUM(total) as total'))->groupBy('date')->get();
                $data = array();
                foreach ($contents as $key => $content) {
                    $data['label'][] = $content->date;
                    $data['sales'][] = $content->total;
                }

                return $data;

                break;
            case 'Monthly':
                $contents = OrderContent::select(DB::raw('MONTH(created_at) as month, SUM(total) as total'))->groupBy('month')->get();
                $data = array();
                foreach ($contents as $key => $content) {
                    $data['label'][] = $content->month;
                    $data['sales'][] = $content->total;
                }

                return $data;

                break;

            case 'Annually':
                $contents = OrderContent::select(DB::raw('YEAR(created_at) as year, SUM(total) as total'))->groupBy('year')->get();
                $data = array();
                foreach ($contents as $key => $content) {
                    $data['label'][] = $content->year;
                    $data['sales'][] = $content->total;
                }

                return $data;

                break;

            case 'Weekly':
                $contents = OrderContent::select(DB::raw('DATE_FORMAT(created_at, \'%U\') as week, SUM(total) as total'))->groupBy('week')->get();
                $data = array();
                foreach ($contents as $key => $content) {
                    $data['label'][] = $content->week;
                    $data['sales'][] = $content->total;
                }

                return $data;

                break;

            default:
            $contents = OrderContent::select(DB::raw('DATE(created_at) as date, SUM(total) as total'))->groupBy('date')->get();
            $data = array();
            foreach ($contents as $key => $content) {
                $data['label'][] = $content->date;
                $data['sales'][] = $content->total;
            }

            return $data;
                break;
        }
    }

    public static function sales_pickup_point_graph($location='', $type=null) {
        switch ($type) {
            case 'Daily':

                $contents = OrderContent::select(DB::raw('DATE(created_at) as date, SUM(total) as total'))->where('pickup_location', '=', $location)->groupBy('date')->get();
                $data = array();
                foreach ($contents as $key => $content) {
                    $pickup = Location::find($location);
                    $data['label'][] = $pickup->name;
                    $data['sales'][] = $content->total;
                }

                return $data;

                break;
            case 'Monthly':
                $contents = OrderContent::select(DB::raw('MONTH(created_at) as month, SUM(total) as total'))->where('pickup_location', '=', $location)->groupBy('month')->get();
                $data = array();
                foreach ($contents as $key => $content) {
                    $pickup = Location::find($location);
                    $data['label'][] = $pickup->name;
                    $data['sales'][] = $content->total;
                }

                return $data;

                break;

            case 'Annually':
                $contents = OrderContent::select(DB::raw('YEAR(created_at) as year, SUM(total) as total'))->where('pickup_location', '=', $location)->groupBy('year')->get();
                $data = array();
                foreach ($contents as $key => $content) {
                    $pickup = Location::find($location);
                    $data['label'][] = $pickup->name;
                    $data['sales'][] = $content->total;
                }

                return $data;

                break;

            case 'Weekly':
                $contents = OrderContent::select(DB::raw('DATE_FORMAT(created_at, \'%U\') as week, SUM(total) as total'))->where('pickup_location', '=', $location)->groupBy('week')->get();
                $data = array();
                foreach ($contents as $key => $content) {
                    $pickup = Location::find($location);
                    $data['label'][] = $pickup->name;
                    $data['sales'][] = $content->total;
                }

                return $data;

                break;

            default:
            $contents = OrderContent::select(DB::raw('DATE(created_at) as date, SUM(total) as total'))->where('pickup_location', '=', $location)->groupBy('date')->get();
            $data = array();
            foreach ($contents as $key => $content) {
                $pickup = Location::find($location);
                $data['label'][] = $pickup->name;
                $data['sales'][] = $content->total;
            }

            return $data;
                break;
        }
    }
}
