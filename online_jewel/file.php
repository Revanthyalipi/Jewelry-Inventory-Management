#include<stdio.h>
#include<stdlib.h>
#include<time.h>
#include "session7_sort.h"
double time_elapsed(struct timespec *start, struct timespec *end);
int main()
{
	int n; long int count;
	struct timespec start, end;
	scanf("%d",&n);
	Record* arr = (Record*)malloc(sizeof(Record)*n);
	Record* new = (Record*)malloc(sizeof(Record)*n);
	for(int i=0;i<n;i++)
	{
		scanf("%lu %d",&arr[i].serialnumber,&arr[i].score);
	}
	for(int i=0;i<n;i++)
	{
		new[i] = arr[i];
	}
	clock_gettime(CLOCK_REALTIME, &start);
	count = InsertionSort(new,n);
	clock_gettime(CLOCK_REALTIME, &end);
	printf("Insertion Sort: %lu %f\n",count,time_elapsed(&start,&end));
	
	for(int i=0;i<n;i++)
	{
		new[i] = arr[i];
	}
	clock_gettime(CLOCK_REALTIME, &start);
	count = BubbleSort(new,n);
	clock_gettime(CLOCK_REALTIME, &end);
	printf("Bubble Sort: %lu %f\n",count,time_elapsed(&start,&end));
	
	for(int i=0;i<n;i++)
	{
		new[i] = arr[i];
	}
	clock_gettime(CLOCK_REALTIME, &start);
	count = SelectionSort(new,n);
	clock_gettime(CLOCK_REALTIME, &end);
	printf("selection Sort: %lu %f\n",count,time_elapsed(&start,&end));
	
	for(int i=0;i<n;i++)
	{
		new[i] = arr[i];
	}
	clock_gettime(CLOCK_REALTIME, &start);
	count = MergeSort(new,n);
	clock_gettime(CLOCK_REALTIME, &end);
	printf("Merge Sort: %lu %f\n",count,time_elapsed(&start,&end));
	
	for(int i=0;i<n;i++)
	{
		new[i] = arr[i];
	}
	clock_gettime(CLOCK_REALTIME, &start);
	count = QuickSort(new,n);
	clock_gettime(CLOCK_REALTIME, &end);
	printf("Quick Sort: %lu %f\n",count,time_elapsed(&start,&end));
	
	
}
double time_elapsed(struct timespec *start, struct timespec *end) {
	double t;
	//tv_sec has the time elasped in seconds
	t = (end->tv_sec - start->tv_sec);
	//tv_nsec has the time elasped in nano seconds
	//Final time will be precise with nano seconds
	t += ((end->tv_nsec - start->tv_nsec) * 0.000000001);
	return t;
}
