<?php

namespace App\Services\AccountantServices\InvoiceServices;

class ChatOfAccountService
{
    public function getSpecificLegerEntries(){
        return \App\Models\ChartsOfAccount::where('account_type' ,'=', 'Income')->get();
    }

    public function getLegerEntries(){
        return \App\Models\Entry::with('chartOfAccount', 'user')->orderBy('created_at', 'desc')->get();
    }

    public function getChartOfAccounts(){
        return \App\Models\ChartsOfAccount::orderBy('created_at', 'desc')->get();
    }

    public function entry($request){
        if($request->isSchoolFee){
            $entry = \App\Models\Entry::create([
                'charts_of_accounts_id' => $request->charts_of_accounts_id,
                'user_id' => auth()->user()->id,
                'level_1' => $request->level_1,
                'level_2' => $request->level_2,
                'level_3' => $request->level_3,
                'narration' => $request->narration,
                'school_id' => auth()->user()->school_id,
    
            ]);


            \App\Models\EntryStudent::create([
                'entry_id' => $entry->id,
                'student_id' => $request->studentId,
            ]);

            return true;
        }

        else if(!$request->isSchoolFee){
            \App\Models\Entry::create([
                'charts_of_accounts_id' => $request->charts_of_accounts_id,
                'user_id' => auth()->user()->id,
                'level_1' => $request->level_1,
                'level_2' => $request->level_2,
                'level_3' => $request->level_3,
                'narration' => $request->narration,
                // 'school_id' => auth()->user()->school_id,
    
            ]);

            return true;
        }

        // else if(!$request->isSchoolFee && $request->account_type != 'Income'){
        //     \App\Models\Entry::create([
        //         'charts_of_accounts_id' => $request->charts_of_accounts_id,
        //         'user_id' => auth()->user()->id,
        //         'student_id' => null,
        //         'level_1' => $request->level_1,
        //         'level_2' => $request->level_2,
        //         'level_3' => $request->level_3,
        //         'narration' => $request->narration,
        //         'school_id' => auth()->user()->school_id,
    
        //     ]);
        // }

        // \App\Models\TuitionFee::create([
        //     'charts_of_accounts_id' => 2,
        //     'user_id' => 1,
        //     'amount' => ($request->amount * 10) / 100,
        //     'narration' => $request->narration,

        // ]);
    }

    // public function submitTuitionFee($request){
    //     \App\Models\TuitionFee::create([
    //         'charts_of_accounts_id' => 1,
    //         'user_id' => 1,
    //         'amount' => $request->amount,
    //         'narration' => $request->narration,

    //     ]);

    //     \App\Models\TuitionFee::create([
    //         'charts_of_accounts_id' => 2,
    //         'user_id' => 1,
    //         'amount' => ($request->amount * 10) / 100,
    //         'narration' => $request->narration,

    //     ]);

    //     return true;
    // }

    public function updateChartOfAccount($request){
        return \App\Models\ChartsOfAccount::find($request->id)->update([
            $request->column => $request->data
        ]);
    }

    public function deleteChartOfAccounts($request){
        return \App\Models\ChartsOfAccount::findoRFail($request->id)->delete();
    }
    
    public function addChartOfAccounts($request){
        return \App\Models\ChartsOfAccount::create([
            'account_type' => $request->account_type,
            'level1' => $request->level1,
            'level2' => $request->level2,
            'level3' => $request->level3,
            'name' => $request->name,
            'description' => $request->description ,
            'notes' => $request->notes,

        ]);
    }

    public function headDashboardGetStudents(){
        $totalStudents = \App\Models\Student::where('school_id', auth()->user()->school_id)->orderBy('created_at', 'desc')->get();
        $paidStudents = 1;
        $unpaidStudents = 2;
        return [
            'totalStudents' => $totalStudents->count(),
            'paidStudents' => $paidStudents,
            'unpaidStudents' => $unpaidStudents,
        ];
    }
}