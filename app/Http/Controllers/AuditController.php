<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditTrail = DB::table('audits')
            ->select(
                'audits.id',
                'audits.user_type',
                'audits.user_id',
                'audits.event',
                'audits.auditable_type',
                'audits.auditable_id',
                'audits.old_values',
                'audits.new_values',
                // 'audits.url',
                // 'audits.ip_address',
                // 'audits.user_agent',
                'audits.tags'
            )
            ->get();
        return response($auditTrail, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = DB::select('select * from audits where id = :id', ['id' => $id]);

        if ($results) {
            $auditItem = $results;
            return response($auditItem, 200);
        } else {
            return response()->json([
                "message" => "audit item not found",
            ], 404);
        }
    }

}
