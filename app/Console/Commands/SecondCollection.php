<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use QL\QueryList;

class SecondCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'second_collection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '第二阶段采集';

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
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69688.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69683.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69655.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69646.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69576.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69569.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69520.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69496.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69491.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69440.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69439.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69402.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69389.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69367.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69354.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69353.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69346.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69331.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69324.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69221.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69212.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69201.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69195.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69189.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69188.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69187.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69186.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69179.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69159.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69147.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69135.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/69133.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68941.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68922.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68840.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68839.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68826.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68796.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68791.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68787.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68769.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68748.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68739.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68738.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68735.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68720.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68714.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68711.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68701.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68700.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68680.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68651.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68644.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68590.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68585.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68532.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68513.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68512.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68494.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68489.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68467.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68465.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68337.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68331.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68327.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68324.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/68320.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67812.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67792.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67790.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67777.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67771.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67770.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67734.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67693.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67692.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67680.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67611.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/67605.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66841.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66835.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66809.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66793.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66790.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66784.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66783.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66778.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66776.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66765.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66752.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66751.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66746.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66745.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66738.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66731.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66724.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66719.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66716.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66714.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66712.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66698.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66692.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66595.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66570.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66545.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66540.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66493.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66482.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66453.html',
            ],
            [
                'category_id' => '4',
                'url'=>'https://www.guozhi.org/shiqing/66440.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69666.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69665.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69657.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69578.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69570.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69566.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69554.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69553.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69550.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69519.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69498.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69399.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69397.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69390.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69369.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69340.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69223.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69220.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69210.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69204.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69203.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69202.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69200.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69196.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69165.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69160.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69156.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69148.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69080.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69023.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69019.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/69016.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68995.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68991.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68988.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68984.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68978.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68924.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68844.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68829.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68828.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68809.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68802.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68800.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68790.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68745.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68734.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68726.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68724.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68721.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68715.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68713.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68679.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68586.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68582.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68572.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68571.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68557.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68525.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68506.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68469.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68468.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68464.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68463.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68462.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/68330.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67786.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67782.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67768.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67718.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67717.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67701.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67697.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67691.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67689.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67687.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67684.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67624.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67623.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67615.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67610.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67609.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67604.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67547.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/67546.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66828.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66824.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66823.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66819.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66816.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66811.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66796.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66774.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66771.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66758.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66756.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66754.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66747.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66730.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66709.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66704.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66702.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66701.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66691.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66623.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66537.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66533.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66531.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66528.html',
            ],
            [
                'category_id' => '5',
                'url'=>'https://www.guozhi.org/hunyin/66495.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69686.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69675.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69668.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69647.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69629.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69579.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69545.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69543.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69530.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69529.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69518.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69517.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69493.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69394.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69391.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69377.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69375.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69374.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69372.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69365.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69355.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69352.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69345.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69341.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69339.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69329.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69235.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69232.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69219.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69213.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69205.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69185.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69166.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69157.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69153.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69150.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69033.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/69024.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68985.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68981.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68976.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68949.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68948.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68939.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68938.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68925.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68915.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68799.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68794.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68792.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68785.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68774.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68752.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68744.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68742.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68733.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68705.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68703.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68686.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68681.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68677.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68662.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68584.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68556.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68527.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68526.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68524.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68507.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68329.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68328.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68326.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/68323.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67818.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67815.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67811.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67803.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67791.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67779.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67774.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67769.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67767.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67765.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67736.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67729.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67708.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67690.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67677.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67635.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67629.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67618.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67617.html',
            ],
            [
                'category_id' => '6',
                'url'=>'https://www.guozhi.org/qingchun/67612.html',
            ]
        ];
    }
}
