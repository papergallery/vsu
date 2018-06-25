def selection_sort(arr):
  for k in range(len(arr)):
    min_index = k # smallest element
    for j in range(k+1, len(arr)):
      if arr[min_index] > arr[j]:
    min_index = j
arr[k], arr[min_index] = arr[min_index], arr[k]
