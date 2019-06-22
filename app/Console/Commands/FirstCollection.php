<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use QL\QueryList;

class FirstCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'first_collection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '第一阶段采集';

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
        Article::truncate();
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
            $data[] = [
                'user_id'     => mt_rand(1, 50),
                'category_id' => $url['category_id'],
                'title'       => $rt['title'],
                'body'        => $rt['content'],
                'topic'       => $topic,
                'cover'       => $rt['cover'],
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
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69656.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69643.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69631.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69567.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69551.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69544.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69540.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69535.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69527.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69522.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69495.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69401.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69393.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69237.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69224.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69222.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69217.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69215.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69178.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69177.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69176.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69149.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69140.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69138.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/69039.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68989.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68987.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68980.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68937.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68923.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68874.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68811.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68801.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68786.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68778.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68777.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68747.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68730.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68727.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68706.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68697.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68683.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68649.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68628.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68558.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68543.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68535.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68523.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68521.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68339.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68336.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/68332.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/67801.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/67704.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/67696.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/67637.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/67631.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/67628.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/67626.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66836.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66832.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66800.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66789.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66786.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66782.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66769.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66767.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66766.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66753.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66741.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66729.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66726.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66722.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66721.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66717.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66705.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66551.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66550.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66527.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66498.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66491.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66483.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66478.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66468.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66419.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66406.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66405.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66389.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66385.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66323.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66300.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66215.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66202.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66195.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66183.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66180.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66127.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66097.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66047.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66046.html',
            ],
            [
                'category_id' => '1',
                'url'=>'https://www.guozhi.org/aiqing/66045.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69687.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69640.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69639.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69575.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69565.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69492.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69449.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69403.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69368.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69366.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69356.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69348.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69330.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69239.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69236.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69234.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69233.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69225.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69216.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69171.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69162.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69161.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69155.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69146.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69144.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69017.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/69014.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68979.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68951.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68940.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68838.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68831.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68814.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68810.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68798.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68773.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68729.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68725.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68718.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68717.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68710.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68702.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68699.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68678.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68617.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68583.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68570.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68531.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68490.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68335.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68334.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/68325.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67810.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67795.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67794.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67789.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67788.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67785.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67778.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67775.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67773.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67766.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67764.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67738.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67735.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67730.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67727.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67720.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67688.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67683.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67681.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67636.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67632.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67627.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67625.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67619.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67613.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/67602.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66839.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66820.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66797.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66775.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66768.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66762.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66760.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66755.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66725.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66720.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66713.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66707.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66627.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66566.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66561.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66547.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66542.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66541.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66539.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66532.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66529.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66508.html',
            ],
            [
                'category_id' => '2',
                'url'=>'https://www.guozhi.org/qihuan/66505.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69663.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69577.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69573.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69564.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69563.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69499.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69373.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69342.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69335.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69323.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69238.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69211.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69191.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69184.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69183.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69175.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69154.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/69020.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68990.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68983.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68982.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68977.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68950.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68942.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68931.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68930.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68906.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68872.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68843.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68841.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68830.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68803.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68797.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68789.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68788.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68768.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68751.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68749.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68728.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68712.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68707.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68685.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68682.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68665.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68650.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68645.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68611.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68610.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68580.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68545.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68544.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68533.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68514.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68470.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68338.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/68333.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67809.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67804.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67796.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67737.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67728.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67719.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67698.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67634.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67622.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/67548.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66834.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66817.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66810.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66804.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66802.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66785.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66779.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66772.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66761.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66750.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66723.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66718.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66711.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66706.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66699.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66694.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66567.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66565.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66559.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66555.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66552.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66543.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66530.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66484.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66475.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66474.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66458.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66416.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66415.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66387.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66382.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66368.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66365.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66363.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66319.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66298.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66216.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66203.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66200.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66198.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66188.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66182.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66113.html',
            ],
            [
                'category_id' => '3',
                'url'=>'https://www.guozhi.org/xuanyi/66084.html',
            ]
        ];
    }
}
