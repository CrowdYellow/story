<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use QL\QueryList;

class FourthCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fourth_collection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '第四阶段采集';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = [];
        foreach ($this->urls() as $url) {
            $rules = [
                'title'   => ['h1', 'text'],
                'topic'   => ['.tag>a', 'text'],
                'content' => ['.main', 'html'],
                'cover'   => ['.main img', '_src'],
            ];
            $rt = QueryList::get($url['url'])->rules($rules)->query()->getData()->all()[0];
            $topic = isset($rt['topic']) ? $rt['topic'] : "故事";
            $cover = isset($rt['cover']) ? $rt['cover'] : "";
            $data[] = [
                'user_id'     => mt_rand(1, 50),
                'category_id' => $url['category_id'],
                'title'       => $rt['title'],
                'body'        => $rt['content'],
                'topic'       => $topic,
                'cover'       => $cover,
                'excerpt'     => $this->make_excerpt($rt['content']),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }
        DB::table('articles')->insert($data);
    }

    public function make_excerpt($value, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
        return Str::limit($excerpt, $length);
    }

    public function urls()
    {
        return [
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69709.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69703.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69701.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69623.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69568.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69552.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69515.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69126.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69125.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69124.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69117.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69098.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69094.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69089.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69088.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69071.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69070.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69069.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69035.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69030.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69028.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/69026.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68952.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68936.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68893.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68891.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68887.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68886.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68761.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68760.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68629.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68627.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68624.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68620.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68616.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68472.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68460.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68457.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68397.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68386.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68318.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68317.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68313.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68307.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68304.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68241.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68218.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68201.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68200.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68165.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68159.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68028.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68027.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68026.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/68025.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67927.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67922.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67887.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67885.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67880.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67838.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67837.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67836.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67724.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67721.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67703.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67675.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67647.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67646.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67596.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67593.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67589.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67588.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67413.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67411.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67410.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67407.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67339.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67326.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67316.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67281.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67254.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67253.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67252.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67251.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67250.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67249.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67248.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67247.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67246.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67245.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67244.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67243.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67242.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67241.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67240.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67239.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67238.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67237.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67236.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67235.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67234.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67224.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67222.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67217.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67212.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67209.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67207.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67201.html',
            ],
            [
                'category_id' => '10',
                'url'=>'https://www.guozhi.org/ask/67200.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67284.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67283.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67282.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67280.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67279.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67278.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67277.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67276.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67275.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67274.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67273.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67272.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67271.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67270.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67266.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67257.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67256.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67255.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67233.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67232.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67231.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67230.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67229.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67228.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67227.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67226.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67225.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67223.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67221.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67219.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67220.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67218.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67216.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67215.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67214.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67213.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67211.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67210.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67208.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67206.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67205.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67204.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67203.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67202.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67199.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67198.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67197.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67196.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67195.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67194.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67193.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67192.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67191.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67190.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67189.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67188.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67187.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67186.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67185.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67184.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67183.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67182.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67181.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67180.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67179.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67178.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67177.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67176.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67175.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67167.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67166.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67165.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67164.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67163.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67162.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67161.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67160.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67159.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67158.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67157.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67150.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67149.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67148.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67147.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67146.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67145.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67143.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67142.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67141.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67140.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67139.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67130.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67126.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67125.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67124.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67123.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67122.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67121.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67120.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67119.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67118.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67117.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67116.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67115.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67114.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67108.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67107.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67105.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67104.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67103.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67102.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67101.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67100.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67099.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67098.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67097.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67096.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67095.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67094.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67092.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67090.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67089.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67088.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67087.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67086.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67083.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67082.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67081.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67080.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67079.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67076.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67075.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67071.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67070.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67069.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67068.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67067.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67066.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67065.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67064.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67063.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67058.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67057.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67056.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67055.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67054.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67053.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67052.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67051.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67050.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67049.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67048.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67047.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67046.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67045.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67041.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67040.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67038.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67033.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67032.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67031.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67030.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67029.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67023.html',
            ],
            [
                'category_id' => '11',
                'url'=>'https://www.guozhi.org/news/67022.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67603.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66838.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66830.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66803.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66799.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66798.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66794.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66788.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66787.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66773.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66743.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66742.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66739.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66715.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66708.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66697.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66626.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/66563.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/54940.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/54939.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48141.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48119.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48092.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48091.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48090.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48089.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48034.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48029.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/48013.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/47969.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/47915.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/47778.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/47777.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/47776.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/47762.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/47739.html',
            ]
        ];
    }
}
