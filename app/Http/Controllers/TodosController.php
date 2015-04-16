<?php namespace App\Http\Controllers;

use App\Todo;
use App\Http\Requests;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TodosController extends Controller {

  protected $todo;

  /**
   * Create new todo instance
   *
   * @return void
   */
  public function __construct(Todo $todo)
  {
    $this->todo = $todo;
  }
  

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $todos = Todo::all();
    return $todos;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TodoRequest $request)
	{
    // $todo = Todo::create($request>all());
    $this->todo->title = $request->title;
    $this->todo->done = 0; 
    $this->todo->save();
    return $this->todo;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(TodoRequest $request, $id)
	{
    $todo = Todo::find($id); 
    $todo->done = $request->input('done');
    $todo->save();

    return $todo;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    Todo::destroy($id);
	}

}
