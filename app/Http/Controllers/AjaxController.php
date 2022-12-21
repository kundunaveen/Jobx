<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CompanyRating;
use App\Models\Country;
use App\Models\FavoriteJob;
use App\Models\State;
use App\Models\Vacancy;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
    public function companyRatingStoreUpdate(Request $request)
    {

        $data = [
            'status' => false,
            'message' => '',
        ];
        try {
            if ($request->has(['rating_value', 'user_id', 'company_id'])) {

                $rating_value = $request->rating_value;
                $user_id = $request->user_id;
                $company_id = $request->company_id;

                CompanyRating::updateOrCreate(
                    ['employee_id' => $user_id, 'company_id' => $company_id],
                    ['rating' => $rating_value]
                );
                $avgStar = CompanyRating::where('company_id' , $company_id)->avg('rating');
                if($avgStar){
                    Profile::where('user_id',$company_id)->update(['avg_rating'=>$avgStar]);
                }
                $data['status'] = true;
                $data['message'] = 'Data successfully added';
            } else {
                $data['status'] = false;
                $data['message'] = 'Values are missing';
            }
        } catch (\Exception $e) {
            $data['status'] = false;
            $data['message'] = $e->getMessage();
        }
        return Response::json($data);
    }

    public function addFavoriteVacancy(Request $request)
    {
        $data = [
            'status' => false,
            'message' => '',
            'html' => '',
        ];
        
        try {
            if ($request->has(['user_id', 'vacancy_id'])) {

                $user_id = $request->user_id;
                $vacancy_id = $request->vacancy_id;

                FavoriteJob::create([
                    'user_id' => $user_id,
                    'vacancy_id' => $vacancy_id
                ]);

                $data['status'] = true;
                $data['message'] = 'Added your favorite job';

                $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                    'add_favorite_vacancy' => false,
                    'user_id' => $user_id,
                    'vacancy_id' => $vacancy_id,
                    'route' => route('favorite-vacancy.destroy'),
                ])->render();

            } else {
                
                $data['status'] = false;
                $data['message'] = 'Values are missing';

                $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                    'add_favorite_vacancy' => true,
                    'user_id' => '',
                    'vacancy_id' => '',
                    'route' => route('favorite-vacancy.add'),
                ])->render();
            }
        } catch (\Exception $e) {

            $data['status'] = false;
            $data['message'] = $e->getMessage();

            $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                'add_favorite_vacancy' => true,
                'user_id' => '',
                'vacancy_id' => '',
                'route' => route('favorite-vacancy.add'),
            ])->render();
        }
        return Response::json($data);
    }

    public function destroyFavoriteVacancy(Request $request)
    {
        $data = [
            'status' => false,
            'message' => '',
            'html' => '',
        ];
        try {
            if ($request->has(['user_id', 'vacancy_id'])) {

                $user_id = $request->user_id;
                $vacancy_id = $request->vacancy_id;

                FavoriteJob::where([
                    'user_id' => $user_id,
                    'vacancy_id' => $vacancy_id
                ])->delete();

                $data['status'] = true;
                $data['message'] = 'Remove your favorite job';
                
                $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                    'add_favorite_vacancy' => true,
                    'user_id' => $user_id,
                    'vacancy_id' => $vacancy_id,
                    'route' => route('favorite-vacancy.add'),
                ])->render();
            } else {
                $data['status'] = false;
                $data['message'] = 'Values are missing';
                $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                    'add_favorite_vacancy' => true,
                    'user_id' => '',
                    'vacancy_id' => '',
                    'route' => route('favorite-vacancy.destroy'),
                ])->render();
            }
        } catch (\Exception $e) {
            $data['status'] = false;
            $data['message'] = $e->getMessage();
            $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                'add_favorite_vacancy' => true,
                'user_id' => '',
                'vacancy_id' => '',
                'route' => route('favorite-vacancy.destroy'),
            ])->render();
        }
        return Response::json($data);
    }

    public function vacancyAutoCompleteSearch(Request $request)
    {
        $data = [
            'status' => false,
            'message' => '',
            'data' => '',
        ];
        try {
            if ($request->has('search_keyword')) {

                $search_keyword = $request->search_keyword;
                
                $job_titles_data = [];
                $job_role_data = [];
                $department_data = [];

                $job_titles_model = Vacancy::select('job_title')
                ->where('job_title', 'like', "%{$search_keyword}%")
                ->orderBy('job_title', 'asc')                
                ->distinct()
                ->take(10)
                ->get();

                if($job_titles_model->count()){
                    foreach($job_titles_model as $job_title){
                        $job_titles_data[] = $job_title->job_title;
                    }
                }

                $job_role_model = Vacancy::select('job_role')
                ->where('job_role', 'like', "%{$search_keyword}%")
                ->orderBy('job_role', 'asc')                
                ->distinct()
                ->take(10)
                ->get();

                if($job_role_model->count()){
                    foreach($job_role_model as $job_role){
                        $job_role_data[] = $job_role->job_role;
                    }
                }

                $department_model = Vacancy::select('department')
                ->where('department', 'like', "%{$search_keyword}%")
                ->orderBy('department', 'asc')
                ->distinct()
                ->take(10)
                ->get();

                if($department_model->count()){
                    foreach($department_model as $department){
                        $department_data[] = $department->department;
                    }
                }

                $autocomplete_data = array_merge($job_titles_data, $job_role_data, $department_data);

                $data['status'] = true;
                $data['message'] = 'Success';
                
                $data['data'] = $autocomplete_data;
            } else {
                $data['status'] = false;
                $data['message'] = 'Search value missing';
                $data['data'] = '';
            }
        } catch (\Exception $e) {
            $data['status'] = false;
            $data['message'] = $e->getMessage();
            $data['data'] = '';
        }
        return Response::json($data);
    }

    public function locationAutoCompleteSearch(Request $request)
    {
        $data = [
            'status' => false,
            'message' => '',
            'data' => '',
        ];
        try {
            if ($request->has('search_location')) {

                $search_location = $request->search_location;
                
                $location_data = [];
                $country_data = [];
                $state_data = [];
                $city_data = [];

                $location_model = Vacancy::select('location')
                ->where('location', 'like', "%{$search_location}%")
                ->take(10)
                ->orderBy('location', 'asc')
                ->get();

                if($location_model->count()){
                    foreach($location_model as $location){
                        $location_data[] = $location->location;
                    }
                }

                $country_model = Country::select('name')
                ->whereHas('vacancies')
                ->where('name', 'like', "%{$search_location}%")
                ->orderBy('name', 'asc')
                ->take(10)
                ->distinct()
                ->get();

                if($country_model->count()){
                    foreach($country_model as $country){
                        $country_data[] = $country->name;
                    }
                }

                $state_model = State::select('name')
                ->whereHas('vacancies')
                ->where('name', 'like', "%{$search_location}%")
                ->orderBy('name', 'asc')
                ->distinct()
                ->take(10)
                ->get();

                if($state_model->count()){
                    foreach($state_model as $state){
                        $state_data[] = $state->name;
                    }
                }

                $city_model = City::select('city')
                ->whereHas('vacancies')
                ->where('city', 'like', "%{$search_location}%")
                ->orderBy('city', 'asc')
                ->distinct()
                ->take(10)
                ->get();

                if($city_model->count()){
                    foreach($city_model as $city){
                        $city_data[] = $city->city;
                    }
                }

                $autocomplete_data = array_merge($location_data, $country_data, $state_data, $city_data);

                $data['status'] = true;
                $data['message'] = 'Success';
                
                $data['data'] = $autocomplete_data;
            } else {
                $data['status'] = false;
                $data['message'] = 'Search value missing';
                $data['data'] = '';
            }
        } catch (\Exception $e) {
            $data['status'] = false;
            $data['message'] = $e->getMessage();
            $data['data'] = '';
        }
        return Response::json($data);
    }
}
