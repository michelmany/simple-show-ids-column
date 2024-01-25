<?php

namespace MMSSIC\Base;

class ColumnsController
{
	public function register(): void
	{
		add_filter( 'manage_posts_columns', array( $this, 'addColumn' ), 5 );
		add_action( 'manage_posts_custom_column', array( $this, 'columnContent' ), 5, 2 );
		add_filter( 'manage_page_posts_columns', array( $this, 'addColumn' ), 5 );
		add_action( 'manage_page_posts_custom_column', array( $this, 'columnContent' ), 5, 2 );

		add_filter( 'manage_posts_columns', array( $this, 'columnOrder' ) );
		add_filter( 'manage_pages_columns', array( $this, 'columnOrder' ) );

		add_action( 'admin_head', array( $this, 'changeColumnWidth' ) );
	}

	/**
	 * @param $columns
	 *
	 * @return mixed
	 */
	public function addColumn( $columns )
	{
		$columns['post_id_column'] = 'ID';

		return $columns;
	}

	/**
	 * @param $column
	 * @param $id
	 *
	 * @return void
	 */
	public function columnContent( $column, $id ): void
	{
		if ( $column === 'post_id_column' ) {
			echo esc_html( $id );
		}
	}

	/**
	 * @param $columns
	 *
	 * @return array
	 */
	public function columnOrder( $columns ): array
	{
		$n_columns = array();
		$move = 'post_id_column'; // what to move
		$before = 'title'; // move before this
		foreach ( $columns as $key => $value ) {
			if ( $key === $before ) {
				$n_columns[ $move ] = $move;
			}

			$n_columns[ $key ] = $value;
		}

		return $n_columns;
	}

	public function changeColumnWidth(): void
	{
		?>
        <style>
            .column-post_id_column {
                width: 95px;
            }
        </style>
		<?php
	}
}
