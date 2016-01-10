<?php
namespace App\Http\Controllers;

use App\Models\Annotation;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController {

    /**
     * @param Request $request
     * @return string
     */
    public function search(Request $request)
    {
        $annotations = Annotation::where('page_id', $request->get('page'))->get();

        return response()->json(['total' => count($annotations), 'rows' => $annotations]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $annotation = [
            'ranges' => $data['ranges'],
            'quote'  => $data['quote'],
            'text'   => $data['text'],
            'page_id'   => $request->get('page')
        ];

        if($id = Annotation::create($annotation)) {
            return response()->json(['status' => 'success', 'id' => $id]);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, Request $request)
    {
        $annotation = Annotation::find($id);
        if($annotation) {
            $data = json_decode($request->getContent(), true);
            $annotation->ranges = $data['ranges'];
            $annotation->quote = $data['quote'];
            $annotation->text = $data['text'];
            $annotation->page_id = $data['page_id'];

            if($annotation->save()) {
                return response()->json(['status' => 'success']);
            }
        }

        return response()->json(['status' => 'error']);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        if(Annotation::destroy($id)) {
            return response()->json(['status' => 'error']);
        }

        return response()->json(['status' => 'success']);
    }
}