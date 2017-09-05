<?php
class CommonModel extends MY_Model
{
	function Posts($Limit = 10, $Offset = 0, $search = "")
    {
        $this->db->select(' dp_posts.IdPost, dp_posts.PostName, dp_posts.PostDescription, substr( dp_posts.PostContent,1,2000 ) as PostContent, dp_posts.PostImage, dp_posts.PostedBy, dp_posts.PostedDate, count(DISTINCT dp_views.IdViews) as PostViews, count( DISTINCT dp_post_comments.IdPostComments ) as CommentsCount');

        $this->db->from('dp_posts');

				$this->db->join('dp_post_comments','dp_posts.IdPost = dp_post_comments.IdPost AND dp_post_comments.Active = 1 ','left');

				$this->db->join('dp_views','dp_views.IdPost = dp_posts.IdPost','left');

				$this->db->where('dp_posts.Active',1);

				if($search != ""){
					$this->db->like('LOWER(dp_posts.PostName)',strtolower($search));
					$this->db->or_like('LOWER(dp_posts.PostDescription)',strtolower($search));
					$this->db->or_like('LOWER(dp_posts.PostedBy)',strtolower($search));
				}

				$this->db->group_by('dp_posts.IdPost');

				$this->db->order_by('dp_posts.IdPost','DESC');

				$this->db->limit($Limit, $Offset);

        $Query = $this->db->get('',null,null,FALSE,10);

				return $Query->result_array();
	}

	function RecentPosts(){

		$this->db->select(' IdPost, PostName, PostedBy ');

		$this->db->from('dp_posts');

		$this->db->where('Active',1);

		$this->db->order_by('IdPost','DESC');

		$this->db->limit(10);

		$Query = $this->db->get('',null,null,FALSE,10);

		return $Query->result_array();
	}

	function RecentComments(){

		$this->db->select(' dp_post_comments.IdPost, dp_post_comments.CommenterName, dp_post_comments.CommenterEmail,substr(dp_post_comments.Comment,1,100) as Comment, dp_post_comments.CommentDate');

		$this->db->from('dp_post_comments');

		$this->db->join('dp_posts','dp_posts.IdPost = dp_post_comments.IdPost');
		
		$this->db->where('dp_posts.Active',1);

		$this->db->where('dp_post_comments.Active',1);

		$this->db->order_by('dp_post_comments.CommentDate','DESC');

		$this->db->limit(10);

		$Query = $this->db->get('',null,null,FALSE,10);

		return $Query->result_array();

	}

	function PostDetails( $IdPost ){

		$this->db->select(' dp_posts.IdPost,dp_posts.PostName, PostDescription, PostContent, PostImage, PostedBy, PostedDate,count(DISTINCT dp_views.IdViews) as PostViews, count( DISTINCT dp_post_comments.IdPostComments ) as CommentsCount');

		$this->db->from('dp_posts');

		$this->db->join('dp_post_comments','dp_posts.IdPost = dp_post_comments.IdPost AND dp_post_comments.Active = 1','left');

		$this->db->join('dp_views','dp_views.IdPost = dp_posts.IdPost','left');

		$this->db->where('dp_posts.Active',1);

		$this->db->where('dp_posts.IdPost',$IdPost);

		$this->db->group_by('dp_posts.IdPost');

		$this->db->limit(1);

		$Query = $this->db->get('',null,null,FALSE,10);

		return $Query->result_array();
	}

	function Comments( $IdPost ){

		$this->db->select(' IdPost,CommenterName, CommenterEmail, Comment, CommentDate');

		$this->db->from('dp_post_comments');

		$this->db->where('Active',1);

		$this->db->where('IdPost',$IdPost);

		$this->db->order_by('CommentDate','DESC');

		$this->db->limit(10);

		$Query = $this->db->get('',null,null,FALSE,10);

		return $Query->result_array();
	}

	public function AddComment(){
		$data = array(
		   'IdPost' => $_POST['id_post'],
		   'CommenterName' => $_POST['name'],
		   'CommenterEmail' => $_POST['email'],
			 'Comment'=>$_POST['comment'],
			 'Active'=>1,
			 'ip'=>$_SERVER['REMOTE_ADDR']
		);

		$this->db->insert('dp_post_comments', $data);

		return $this->db->affected_rows();
	}

	public function AddContact(){
		$data = array(
		   'Name' => $_POST['name'],
		   'Email' => $_POST['email'],
		   'MonNo' => $_POST['mob_no'],
			 'Website'=>$_POST['url'],
			 'Message'=>$_POST['message'],
			 'ip'=>$_SERVER['REMOTE_ADDR']
		);

		$this->db->insert('dp_contacts', $data);

		return $this->db->affected_rows();
	}

	public function HospitalLogin($userName,$password){

		$this->db->select(' IdUser, UserName, DisplayName');

		$this->db->from('dp_users');

		$this->db->where('Active', 1);

		$this->db->where('UserName', $userName);

		$this->db->where('Password', $password);

		$Query = $this->db->get('',null,null,FALSE,10);

		return $Query->result_array();
	}

	public function GetPosts( $Limit = 100, $Offset = 0, $search = "" ){
		$this->db->select(' dp_posts.IdPost, dp_posts.PostName, dp_posts.PostDescription, substr( dp_posts.PostContent,1,1000 ) as PostContent, dp_posts.PostImage, dp_posts.PostedBy, dp_posts.PostedDate, count(DISTINCT dp_views.IdViews) as PostViews, count( DISTINCT dp_post_comments.IdPostComments ) as CommentsCount');

		$this->db->from('dp_posts');

		$this->db->join('dp_post_comments','dp_posts.IdPost = dp_post_comments.IdPost','left');

		$this->db->join('dp_views','dp_views.IdPost = dp_posts.IdPost','left');

		$this->db->where('dp_posts.Active',1);

		if($search != ""){
			$this->db->like('LOWER(dp_posts.PostName)',strtolower($search));
			$this->db->or_like('LOWER(dp_posts.PostDescription)',strtolower($search));
			$this->db->or_like('LOWER(dp_posts.PostedBy)',strtolower($search));
		}

		$this->db->group_by('dp_posts.IdPost');

		$this->db->order_by('dp_posts.IdPost','DESC');

		$this->db->limit($Limit, $Offset);

		$Query = $this->db->get('',null,null,FALSE,10);

		return $Query->result_array();
	}

	function Views(){

		$idPost = $_POST['IdPost'];

		$IP = $_SERVER['REMOTE_ADDR'];

		$data = array(
			 'IdPost' => $idPost,
			 'Ip' => $_SERVER['REMOTE_ADDR']
		);

		$this->db->insert('dp_views', $data);

	}

}
?>
