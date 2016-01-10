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
            'ranges'  => $data['ranges'],
            'quote'   => $data['quote'],
            'text'    => $data['text'],
            'page_id' => $data['page']
        ];

        try {
            $annotation = Annotation::create($annotation);

            return response()->json(['status' => 'success', 'id' => $annotation->id]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
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
            $annotation->page_id = $data['page'];

            try {
                $annotation->save();

                return response()->json(['status' => 'success']);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
            }

        }

        return response()->json(['status' => 'error', 'message' => 'Could not find the annotation.'], 400);

    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        try {
            if(Annotation::destroy($id)) {
                return response('', 204);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }

        return response()->json(['status' => 'error', 'message' => 'Could not find the annotation.'], 400);
    }
}