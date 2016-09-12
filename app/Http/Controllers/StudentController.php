<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * 原生sql
     * @author: jichao.wang <braveontheroad@gmail.com>
     */
    public function test1()
    {
        //insert
        $bool = DB::insert('insert into student(name,age) VALUES(?,?)',
            [
                'imooc',
                20
            ]);
        dump($bool);

        //update
        $num = DB::update('update student set age=? WHERE name = ?',[
            21,
            'imooc'
        ]);
        dump($num);

        //select
        $students = DB::select('select * from student');
        dump($students);

        //delete
        $num = DB::delete('delete from student WHERE name=?',[
            'imooc'
        ]);
        dump($num);
    }

    /**
     * query　builder insert
     * @author: jichao.wang <braveontheroad@gmail.com>
     */
    public function querybuilderinsert()
    {
        //insert
        $bool = DB::table('student')->insert(
            [
                'name' => 'haha',
                'age' => 18
            ]
        );

        dump($bool);

        //insert and get insert id
        $id = DB::table('student')->insertGetId(
            [
                'name' => 'haha1',
                'age' => 18
            ]
        );

        dump($id);

        //mutil insert
        $bool = DB::table('student')->insert([
            [
                'name' => 'haha2',
                'age' => 18
            ],
            [
                'name' => 'haha3',
                'age' => 18
            ]
        ]);
    }

    /**
     * query　builder update
     * @author: jichao.wang <braveontheroad@gmail.com>
     */
    public function querybuilderupdate()
    {
        $num = DB::table('student')
            ->where('id',12)
            ->update(['age'=>18]);
        dump($num);

        $num = DB::table('student')->increment('age');
        $num = DB::table('student')->increment('age',5);
        dump($num);


        $num = DB::table('student')->decrement('age');
        $num = DB::table('student')->decrement('age',5);
        dump($num);


        $num = DB::table('student')
            ->where('id',12)
            ->increment('age',5);
        dump($num);

        $num = DB::table('student')
            ->where('id',12)
            ->increment('age',5,['name'=>'niuniu']);
        dump($num);
    }

    /**
     * query　builder delete
     * @author: jichao.wang <braveontheroad@gmail.com>
     */
    public function querybuilderdelete()
    {
        $num = DB::table('student')
            ->where('id',18)
            ->delete();
        dump($num);

        $num = DB::table('student')
            ->where('id' ,'>=',18)
            ->delete();
        dump($num);

        DB::table('student')
            ->truncate();
    }

    /**
     * query　builder select
     * @author: jichao.wang <braveontheroad@gmail.com>
     */
    public function querybuilderselect()
    {
        //get
        $students = DB::table('student')->get();
        dump($students);

        //first 获取结果集中的第一条数据
        $student = DB::table('student')
            ->orderBy('id', 'desc')
            ->first();
        dump($student);


        //where
        $students = DB::table('student')
            ->where('id', '>=', 12)
            ->get();
        dump($students);

        //whereRaw
        $students = DB::table('student')
            ->whereRaw('id >= ? and age > ?', [1,1])
            ->get();
        dump($students);

        //pluck
        $names = DB::table('student')
            ->pluck('name');
        dump($names);

        //lists
        $names = DB::table('student')
            ->lists('name','id');
        dump($names);

        //select
        $students = DB::table('student')
            ->select('id', 'name', 'age')
            ->get();
        dump($students);

        //chunk 分块查询降低内存
        DB::table('student')->chunk(2, function ($students) {
            dump($students);

            //如果不想查询了就return false, 就不会继续向下查询了
        });

    }

    /**
     * query　builder 聚合函数的使用
     * @author: jichao.wang <braveontheroad@gmail.com>
     */
    public function querybuilderjuhe()
    {
        //count
        $num = DB::table('student')->count();
        dump($num);

        //max, min
        $max = DB::table('student')->max('age');
        dump($max);

        $min = DB::table('student')->min('age');
        dump($min);

        //avg
        $avg = DB::table('student')->avg('age');
        dump($avg);

        //sum
        $sum = DB::table('student')->sum('age');
        dump($sum);

    }

    /**
     * ORM 操作
     * @author: jichao.wang <braveontheroad@gmail.com>
     */
    public function ormselect()
    {
        //all()
        $students = Student::all();
        dump($students);

        //find()　默认根据主键查找
        $student = Student::find(1);
        dump($student);

        //findOrFail()　根据主键查找没有就报错
        $student = Student::findOrFail(1);
        dump($student);

        $students = Student::get();
        dump($students);

        $student = Student::where('id', '>=', 1)
            ->orderBy('age', 'desc')
            ->first();
        dump($student);

        //分组查询
        Student::chunk(2, function ($sutdents) {
            dump($sutdents);
        });

        //聚合函数
        $max = Student::where('id', '>=', 2)->max('age');
        dump($max);

    }

    /**
     * @author: jichao.wang <braveontheroad@gmail.com>
     */
    public function orminsert()
    {
        //使用模型新增数据
//        $student = new Student();
//        $student->name = 'lisi';
//        $student->age = 28;
//        $bool = $student->save();
//        dump($bool);
//
//        $student = Student::find(8);
//        dd($student);
//
//        //使用模型的Create方法新增数据
//        $student = Student::create(
//            ['name'=>'wangwu', 'age'=>18]
//        );
//        dd($student);

        //firstOrCreate 查询一个记录，如果不存在就创建并写入数据库
        $student = Student::firstOrCreate(
            ['name' => 'fds']
        );
        dd($student);


        //firstOrNew 查询一个记录，如果不操作就创建一个实例，但是不入库
        $student = Student::firstOrNew(
            ['name' => 'fds']
        );
        $bool = $student->save();
        dd($student);

    }


    //===================================使用ＯＲＭ更新数据
    public function ormupdate()
    {
//        $student = Student::find(10);
//        $student->name='kitty';
//        $bool = $student->save();
//        dd($bool);


        $num = Student::where('id', '>', 10)->update(
            ['age' => 90]
        );
        dd($num);
    }

    //===================================使用ＯＲＭ删除数据
    public function ormdelete()
    {
        //通过模型删除
//        $student = Student::find(10);
//        $bool = $student->delete();
//        dd($bool);

        //通过主键删除
        $num = Student::destroy(11);
        $num = Student::destroy([11,12]);
        dd($num);

        //删除指定条件的数据
        $num = Student::where('id', '>=', 6)->delete();
        dd($num);
    }

    public function section1()
    {
        $name = 'lisi';
        $arr = [1,2,2.5,3,4];
        return view('student.section1', [
            'name' => $name,
            'arr' => $arr
        ]);
    }

    public function urlTest()
    {
        url('urltest');
        action('StudentController@urlTest');
        route('urlalias');
    }
}
