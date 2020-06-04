<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;
use yii\data\Pagination;

/**
 * PostSearch represents the model behind the search form of `app\models\Post`.
 */
class PostSearch extends Post
{
    public $searchString;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'rating', 'category_id', 'profile_id'], 'integer'],
            [['date', 'topic', 'description', 'body', 'status', 'searchString'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'post_id' => $this->post_id,
            'date' => $this->date,
            'rating' => $this->rating,
            'category_id' => $this->category_id,
            'profile_id' => $this->profile_id,
        ]);

        $query->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'status', $this->status]);

        $words_array = explode(" ", $this->searchString);

        foreach ($words_array as $word){
            $query->orFilterWhere(['like', 'topic', $word])
                ->orFilterWhere(['like', 'description', $word])
                ->orFilterWhere(['like', 'body', $word]);
        }

        return $this->_getPaginatedDataProvider($query, $dataProvider);
    }
    public function searchQuery($query){
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->_getPaginatedDataProvider($query, $dataProvider);

    }

    private function _getPaginatedDataProvider($query, $dataProvider){
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $dataProvider->pagination = $pagination;
        return $dataProvider;
    }
}

