<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Document;
use App\Keyval;


class DocumentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * return the view of all documents
     *
     * @return \Illuminate\Http\Response
     */
    public function getDocuments() {
        //pull document data from the database
        $documents = DB::table('document')->get();

        //return the documents view with the documents data
        return view('documents', ['documents' => $documents]);
    }

    //function to return document creation view
    public function createDocumentForm() {
        return view('createDocument');
    }

    //function to save data returned by document creation form
    public function createDocument(Request $request) {

        //build data array
        $data = [
            "name" => $request->get('name'),
            'exported' => null
        ];

        //create the document by the document model
        $document = Document::create($data);

        //get the document ID to use for inserting key value pairs
        $docId = $document->id;

        //marker to increment and attach to key and value variable
        $next = 1;

        //keep adding the key and value to the table as long as they exist
         while ($request->get('key'.$next)) {
             $data = [
                 'doc_id' => $docId,
                 'key' => $request->get('key'.$next),
                 'value' => $request->get('value'.$next)
             ];

             $keyval = Keyval::create($data);

            $next++;
         }

        return redirect()->action('DocumentController@getDocuments')->with(['message' => 'Document Created']);
    }

    public function getDocument($id) {
        $document = Document::find($id);
        $docId = $document['id'];
        if (!$document) {
            return redirect()->back()->withInput()->withErrors(['No such document found']);
        }

        //use the keyvals model to get all records with the correct document id
        $keyvals = Keyval::where('doc_id', $docId)->get();

        //return edit doc view with the keyval data
        return view('editDocument')->with(['document' => $document, 'keyvals' => $keyvals]);


    }

    public function saveValue(Request $request, $id) {
        //pull keyval entry from model by id
        $keyval = Keyval::find($id);

        //set the edited value
        $keyval->value = $request->get('value');
        $keyval->save();

        //find the document by doc_id column and assign new updated time
        $document = Document::find($keyval->doc_id);
        $document->updated_at = now();
        $document->save();

        return redirect()->back()->with(['message' => 'Value Saved']);

    }

    public function deleteDocument($id) {
        Keyval::where('doc_id', $id)->delete();
        Document::where('id', $id)->delete();

        return redirect()->action('DocumentController@getDocuments')->with(['message' => 'Document Deleted']);
    }

    public function exportDocuments() {
        //retrieve all documents
        $documents = Document::all();

        return view('exportDocuments')->with(['documents' => $documents]);

    }

    public function downloadDocument($id) {

        //array to output to csv
        $dataArray = array();

        //get all of the keyvals from the model by document id
        $keyvals = Keyval::where('doc_id', $id)->get();

        //get the document for the timestamps
        $thisDocument = Document::find($id);
        $createdAt = $thisDocument->created_at;
        $updatedAt = $thisDocument->updated_at;

        //put dates and column headers in array first
        array_push($dataArray, ['created at: '.$createdAt, 'updated at: '.$updatedAt]);
        array_push($dataArray, ['key', 'value']);

        //push key value pairs onto the array
        foreach ($keyvals as $keyval) {
            array_push($dataArray, [$keyval->key,$keyval->value]);
        }

        // using header will download file instead of saving
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="document'.$id.'.csv"');

        // create file for writing
        $file = fopen('php://output', 'w');

        // write each row to the csv
        foreach ($dataArray as $row) {
            fputcsv($file, $row);
        }
        exit();
    }

}
