<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SnippetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('snippets')->insert([
            'userId' => 1,
            'title' => 'React snippet.. but react is bad tho',
            'content' => "import React from 'react'
import ReactDOM from 'react-dom'
class Hello extends React.Component
{
	render ()
	{
		return
			<div className='message-box'>
				Hello {this.props.name}
			</div>
	}
}

const el = document.body
ReactDOM.render(<Hello name='John'/>, el)",
            'language' => 'javascript',
            'datePosted' => Carbon::now()
        ]);

        DB::table('snippets')->insert([
            'userId' => 1,
            'title' => Str::random(250),
            'content' => "public void PrintStars(object o)
{
    if (o is null) return;     // constant pattern 'null'
    if (!(o is int i)) return; // type pattern 'int i'
    WriteLine(new string('*', i));
}",
            'language' => 'cs',
            'datePosted' => Carbon::now()
        ]);

        DB::table('snippets')->insert([
            'userId' => 2,
            'title' => 'C# Snippet',
            'content' => "@font-face {
	font-family: Chunkfive; src: url('Chunkfive.otf');
}

body, .usertext {
	color: #F0F0F0; background: #600;
	font-family: Chunkfive, sans;
}

@import url(print.css);
@media print {
	a[href^=http]::after {
	    content: attr(href)
	}
}",
            'language' => 'css',
            'datePosted' => Carbon::now()
        ]);

        DB::table('snippets')->insert([
            'userId' => 2,
            'title' => 'Cpp snippet',
            'content' => '#include <iostream>

int main(int argc, char *argv[])
{
	/* An annoying "Hello World" example */
	for (auto i = 0; i < 0xFFFF; i++)
    	cout << "Hello, World!" << endl;

	char c = \'\n\';
	unordered_map <string, vector<string> > m;
	m["key"] = "\\\\"; // this is an error

	return -2e3 + 12l;
}',
            'language' => 'cpp',
            'datePosted' => Carbon::now()
        ]);

        DB::table('snippets')->insert([
            'userId' => 2,
            'title' => 'Another js snippet',
            'content' => Str::random(50),
            'language' => 'javascript',
            'datePosted' => Carbon::now()
        ]);

        DB::table('snippets')->insert([
            'userId' => 3,
            'title' => 'Js snippet',
            'content' => Str::random(50),
            'language' => 'javascript',
            'datePosted' => Carbon::now()
        ]);

        DB::table('snippets')->insert([
            'userId' => 1,
            'title' => 'Cpp again',
            'content' => '#include <iostream>

int main(int argc, char *argv[])
{
	/* An annoying "Hello World" example */
	for (auto i = 0; i < 0xFFFF; i++)
    cout << "Hello, World!" << endl;

	char c = \'\n\';
	unordered_map <string, vector<string> > m;
	m["key"] = "\\\\"; // this is an error

	return -2e3 + 12l;
}',
            'language' => 'cpp',
            'datePosted' => Carbon::now()
        ]);
    }
}
