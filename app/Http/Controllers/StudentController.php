<?php
    /**
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-9-17
     * Time: 下午3:49
     *
     * license GPL
     */

    namespace App\Http\Controllers;

    use App\Student;
    use Illuminate\Http\Request;

    class StudentController extends Controller
    {
        /**
         * 浏览信息
         * @author: jichao.wang <braveontheroad@gmail.com>
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function index()
        {
            $students = Student::paginate(20);
            return view('student.index',[
                'students' => $students
            ]);
        }

        /**
         * 创建学生信息表单
         * @author: jichao.wang <braveontheroad@gmail.com>
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function create(Request $request)
        {
            $student = new Student();

            if ($request->isMethod('post')) {

                //控制器验证
//                $this->validate($request, [
//                    'Student.name' => 'required|min:2|max:20',
//                    'Student.age' => 'required|integer',
//                    'Student.sex' => 'required|integer'
//                ], [
//                    'required' => ':attribute 为必填项',
//                    'min' => ':attribute 长度不符合要求',
//                    'max' => ':attribute 长度不符合要求',
//                    'integer' => ':attribute 必须为整数',
//                ], [
//                    'Student.name' => '姓名',
//                    'Student.age' => '年龄',
//                    'Student.sex' => '性别',
//                ]);

                //Validator 验证
                $validator = \Validator::make($request->input(), [
                    'Student.name' => 'required|min:2|max:20',
                    'Student.age' => 'required|integer',
                    'Student.sex' => 'required|integer'
                ], [
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'max' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为整数',
                ], [
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }


                $data = $request->input('Student');
                if(Student::create($data)){
                    return redirect('student/index')->with('success', 'add success！');
                }else{
                    return redirect()->with('error', 'add fail！')->back();
                }
            }

            return view('student.create', ['student'=>$student]);
        }

        /**
         * 保存学生信息
         * @author: jichao.wang <braveontheroad@gmail.com>
         */
        public function save(Request $request)
        {
            $data = $request->input('Student');
            $student = new Student();
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if($student->save()){
                return redirect('student/index');
            }else{
                return redirect()->back();
            }
        }

        /**
         * 更新学生信息
         * @author: jichao.wang <braveontheroad@gmail.com>
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function update(Request $request, $id)
        {
            $student = Student::find($id);

            if ($request->isMethod('post')) {
                //Validator 验证
                $validator = \Validator::make($request->input(), [
                    'Student.name' => 'required|min:2|max:20',
                    'Student.age' => 'required|integer',
                    'Student.sex' => 'required|integer'
                ], [
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'max' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为整数',
                ], [
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = $request->input('Student');
                $student->name = $data['name'];
                $student->age = $data['age'];
                $student->sex = $data['sex'];

                if ($student->save()) {
                    return redirect('student/index')->with('success', '修改成功－'.$id);
                }else{
                    return redirect()->back();
                }
            }

            return view('student.update', [
                'student' => $student
            ]);
        }

        /**
         * 学生详情
         * @author: jichao.wang <braveontheroad@gmail.com>
         *
         * @param $id
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function detail($id)
        {
            $student = Student::find($id);

            return view('student.detail', [
                'student' => $student
            ]);
        }

        public function delete($id)
        {
            $student = Student::find($id);

            if ($student->delete()) {
                return redirect('student/index')->with('success', '删除成功-'.$id);
            }else{
                return redirect('student/index')->with('error', '删除失败-'.$id);
            }
        }
    }