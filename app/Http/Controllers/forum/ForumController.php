<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForumDetail;
use App\Models\ForumFile;
use App\Models\ForumComment;
use App\Models\PersonnelAgency;
use App\Models\AuthorityType;
use App\Models\PerfResultsType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;
use App\Models\PublicMenusType;

class ForumController extends Controller
{
    public function ForumPages()
    {
        $personnelAgencies = PersonnelAgency::with('ranks')
            ->whereIn('status', [1, 2, 3, 4, 5])
            ->orderByRaw("FIELD(status, 1, 2, 3, 4, 5)")
            ->get();

        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();
        $PublicMenus = PublicMenusType::all();

        $forumDetail = ForumDetail::with(['user', 'comments', 'files'])->paginate(10);

        return view('pages.forum.app', compact(
            'personnelAgencies',
            'PerfResultsMenu',
            'OperationalPlanMenu',
            'AuthorityMenu',
            'PublicMenus',
            'LawsRegsMenu',
            'forumDetail'
        ));
    }

    public function ForumFormCreate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_post.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);
        // dd($request);
        $forumDetail = ForumDetail::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('file_post')) {
            foreach ($request->file('file_post') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('forum-files', $filename, 'public');

                ForumFile::create([
                    'details_id' => $forumDetail->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'สร้างกระดานกระทู้สำเร็จ');
    }

    public function ForumDeatils($id)
    {
        $personnelAgencies = PersonnelAgency::with('ranks')
            ->whereIn('status', [1, 2, 3, 4, 5])
            ->orderByRaw("FIELD(status, 1, 2, 3, 4, 5)")
            ->get();

        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();
        $PublicMenus = PublicMenusType::all();

        $forumDeatils = ForumDetail::with('user', 'comments', 'files')->findOrFail($id);

        $comments = $forumDeatils->comments()->paginate(perPage: 10);

        return view('pages.forum.details.app', compact(
            'personnelAgencies',
            'PerfResultsMenu',
            'OperationalPlanMenu',
            'AuthorityMenu',
            'PublicMenus',
            'LawsRegsMenu',
            'forumDeatils',
            'comments'
        ));
    }

    public function ForumCommentsCreate(Request $request, $id)
    {
        $request->validate([
            'comments_details' => 'required|string',
        ]);

        // dd($request);

        ForumComment::create([
            'details_id' => $id,
            'user_id' => auth()->id(),
            'comments_details' => $request->comments_details,
        ]);

        return redirect()->back()->with('success', 'สร้างคอมเม้นกระดานกระทู้สำเร็จ');
    }
}
