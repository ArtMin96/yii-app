<?php

namespace App\Repository;

use App\DB\ActiveRecord;
use App\Repository\Interfaces\iRepository;
use App\Repository\Traits\SqlArRepositoryTrait;

/**
 * Sample usage
 *
 * $posts = $postRepository->findManyBy('title','title5','like');
 *
 * $posts = $postRepository->findManyBy('title','title5');
 *
 * $posts = $postRepository->findManyByIds([1,2,3]);
 *
 * $posts = $postRepository->findManyWhereIn('text',['text1','text2']);
 *
 * $posts = $postRepository->findManyByCriteria([
 *           ['like', 'title','title'] , ['=','text','text1']
 * ]);
 *
 * $posts = $postRepository->findOneById(2);
 *
 * $postRepository->updateOneById(2, ['title'=>'new new']);
 *
 * $postRepository->updateManyByIds([1,2,3], ['title'=>'new new new']);
 *
 * $postRepository->updateManyBy('title','salam', ['text'=>'sssssssssss'], 'like');
 *
 * $postRepository->updateManyByCriteria([['like','title','salam'],['like','text','text2']], ['text'=>'salam']);
 *
 * $postRepository->deleteManyByIds([2,3]);
 *
 * $postRepository->deleteManyBy('title','title5','like');
 *
 * $posts = $postRepository->findManyWhereIn('title',['salam','salam2'], false);
 *
 * Class AbstractSqlArRepository
 * @package mhndev\yii2Repository
 */
class AbstractSqlArRepository implements iRepository
{

    const PRIMARY_KEY = 'id';

    const APPLICATION_KEY = 'id';

    use SqlArRepositoryTrait;

    /**
     * AbstractSqlArRepository constructor.
     * @param ActiveRecord $model
     * @throws Exceptions\RepositoryException
     */
    public function __construct(ActiveRecord $model)
    {
        $this->model = $model;

        $this->initRepositoryParams();
    }
}