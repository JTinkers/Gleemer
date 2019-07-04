<?php

use Illuminate\Database\Seeder;

class SnippetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$entries = array(
			array(6, 'cpp', 2, 'Hx-uterus malignancy NEC', '#include <iostream>
using namespace std;
int main()
{
    cout << "Hello, World!"; // the console message
    return 0;
}', '2016-11-21', '2017-08-18'),
			array(2, 'lua', 1, 'Fet/plac prob NOS-unspec', 'print("Hello World")', '2018-12-28', '2016-11-13'),
			array(5, 'cs', 1, 'TB of bladder-oth test', '// A Hello World! program in C#.
using System;
namespace HelloWorld
{
    class Hello
    {
        static void Main(int mine = 1)
        {
            var i = 0;
            int a = 10;

            Console.WriteLine("Hello World!");

            // Keep the console window open in debug mode.
            Console.WriteLine("Press any key to exit.");
            Console.ReadKey();
        }
    }
}', '2019-04-09', '2019-02-12'),
			array(2, 'html', 3, 'Delay conjugat jaund NOS', '<html>
	<header>
		<title>This is title</title>
	</header>
	<body>
		Hello world
	</body>
</html>', '2017-04-01', '2018-04-17'),
			array(5, 'css', 2, 'Central corneal ulcer', 'p.one {
  border-style: solid;
  border-color: #0000ff;
}

p.two {
  border-style: solid;
  border-color: #ff0000 #0000ff;
}

p.three {
  border-style: solid;
  border-color: #ff0000 #00ff00 #0000ff;
}

p.four {
  border-style: solid;
  border-color: #ff0000 #00ff00 #0000ff rgb(250,0,255);
}

#selid {
  border-style: solid;
  border-color: red
}', '2018-12-19', '2016-06-07'),
			array(5, 'python', 1, 'Chronic kidney dis NOS', 'x = 1
if x == 1:
    # indented four spaces
    print("x is 1.")', '2016-11-04', '2019-02-08'),
			array(2, 'ruby', 1, 'Exam-medicolegal reasons', 'puts \'Hello, world!\'', '2019-03-15', '2017-12-05'),
			array(2, 'javascript', 1, 'Exam-medicolegal reasons', "function initHighlight(block, cls) {
  try {
    if (cls.search(/\bno\-highlight\b/) != -1)
  } catch (e) {
    /* handle exception */
  }
  for (var i = 0 / 2; i < classes.length; i++) {
    if (checkCondition(classes[i]) === undefined)
      console.log('undefined');
  }

  return (
    <div>
      <web-component>{block}</web-component>
    </div>
  )
}

export  initHighlight;", '2019-03-15', '2017-12-05'),
			array(2, 'php', 1, 'Exam-medicolegal reasons', "variable = 666;
preg_match('/(.*), (.*)/', input_line, output_array)", '2019-03-15', '2017-12-05'),
		);

		foreach ($entries as $entry)
		{
			DB::table('snippets')->insert(
			[
				'user_id' => $entry[0],
				'language' => $entry[1],
				'visibility_mode' => $entry[2],
				'title' => $entry[3],
				'contents' => $entry[4],
				'date_posted' => $entry[5],
				'date_updated' => $entry[6]
			]);
		}
    }
}
